<?php

declare(strict_types=1);

namespace ShoppingCart\Order;

class OrderService implements IOrderService
{
    private IOrderRepository $repository;

    public function __construct(IOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(OrderModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(OrderModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?OrderModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new OrderModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var OrderDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new OrderModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?OrderModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new OrderDto($row);

        return new OrderModel($dto);
    }
}