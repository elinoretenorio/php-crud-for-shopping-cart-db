<?php

declare(strict_types=1);

namespace ShoppingCart\CartItem;

interface ICartItemRepository
{
    public function insert(CartItemDto $dto): int;

    public function update(CartItemDto $dto): int;

    public function get(int $id): ?CartItemDto;

    public function getAll(): array;

    public function delete(int $id): int;
}