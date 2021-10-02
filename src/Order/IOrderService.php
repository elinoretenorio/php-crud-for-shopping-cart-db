<?php

declare(strict_types=1);

namespace ShoppingCart\Order;

interface IOrderService
{
    public function insert(OrderModel $model): int;

    public function update(OrderModel $model): int;

    public function get(int $id): ?OrderModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?OrderModel;
}