<?php

declare(strict_types=1);

namespace ShoppingCart\CartItem;

class CartItemService implements ICartItemService
{
    private ICartItemRepository $repository;

    public function __construct(ICartItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(CartItemModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(CartItemModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?CartItemModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new CartItemModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var CartItemDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new CartItemModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?CartItemModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new CartItemDto($row);

        return new CartItemModel($dto);
    }
}