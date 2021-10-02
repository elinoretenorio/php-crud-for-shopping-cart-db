<?php

declare(strict_types=1);

namespace ShoppingCart\OrderItem;

interface IOrderItemService
{
    public function insert(OrderItemModel $model): int;

    public function update(OrderItemModel $model): int;

    public function get(int $id): ?OrderItemModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?OrderItemModel;
}