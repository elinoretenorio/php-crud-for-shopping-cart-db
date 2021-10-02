<?php

declare(strict_types=1);

namespace ShoppingCart\OrderItem;

interface IOrderItemRepository
{
    public function insert(OrderItemDto $dto): int;

    public function update(OrderItemDto $dto): int;

    public function get(int $id): ?OrderItemDto;

    public function getAll(): array;

    public function delete(int $id): int;
}