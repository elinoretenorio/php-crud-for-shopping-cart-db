<?php

declare(strict_types=1);

namespace ShoppingCart\Product;

class ProductService implements IProductService
{
    private IProductRepository $repository;

    public function __construct(IProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(ProductModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(ProductModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?ProductModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new ProductModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var ProductDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new ProductModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?ProductModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new ProductDto($row);

        return new ProductModel($dto);
    }
}