<?php

declare(strict_types=1);

namespace ShoppingCart\ProductMeta;

class ProductMetaService implements IProductMetaService
{
    private IProductMetaRepository $repository;

    public function __construct(IProductMetaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(ProductMetaModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(ProductMetaModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?ProductMetaModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new ProductMetaModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var ProductMetaDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new ProductMetaModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?ProductMetaModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new ProductMetaDto($row);

        return new ProductMetaModel($dto);
    }
}