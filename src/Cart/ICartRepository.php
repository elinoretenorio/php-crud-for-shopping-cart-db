<?php

declare(strict_types=1);

namespace ShoppingCart\Cart;

interface ICartRepository
{
    public function insert(CartDto $dto): int;

    public function update(CartDto $dto): int;

    public function get(int $id): ?CartDto;

    public function getAll(): array;

    public function delete(int $id): int;
}