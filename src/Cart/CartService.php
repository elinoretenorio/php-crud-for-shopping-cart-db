<?php

declare(strict_types=1);

namespace ShoppingCart\Cart;

class CartService implements ICartService
{
    private ICartRepository $repository;

    public function __construct(ICartRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(CartModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(CartModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?CartModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new CartModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var CartDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new CartModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?CartModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new CartDto($row);

        return new CartModel($dto);
    }
}