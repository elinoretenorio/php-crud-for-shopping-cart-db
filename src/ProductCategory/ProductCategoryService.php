<?php

declare(strict_types=1);

namespace ShoppingCart\ProductCategory;

class ProductCategoryService implements IProductCategoryService
{
    private IProductCategoryRepository $repository;

    public function __construct(IProductCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(ProductCategoryModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(ProductCategoryModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?ProductCategoryModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new ProductCategoryModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var ProductCategoryDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new ProductCategoryModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?ProductCategoryModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new ProductCategoryDto($row);

        return new ProductCategoryModel($dto);
    }
}