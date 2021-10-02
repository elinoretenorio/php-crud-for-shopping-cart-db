<?php

declare(strict_types=1);

namespace ShoppingCart\OrderItem;

class OrderItemService implements IOrderItemService
{
    private IOrderItemRepository $repository;

    public function __construct(IOrderItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(OrderItemModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(OrderItemModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?OrderItemModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new OrderItemModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var OrderItemDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new OrderItemModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?OrderItemModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new OrderItemDto($row);

        return new OrderItemModel($dto);
    }
}