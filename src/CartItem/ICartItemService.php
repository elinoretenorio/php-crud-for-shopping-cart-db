<?php

declare(strict_types=1);

namespace ShoppingCart\CartItem;

interface ICartItemService
{
    public function insert(CartItemModel $model): int;

    public function update(CartItemModel $model): int;

    public function get(int $id): ?CartItemModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?CartItemModel;
}