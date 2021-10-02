<?php

declare(strict_types=1);

namespace ShoppingCart\Order;

interface IOrderRepository
{
    public function insert(OrderDto $dto): int;

    public function update(OrderDto $dto): int;

    public function get(int $id): ?OrderDto;

    public function getAll(): array;

    public function delete(int $id): int;
}