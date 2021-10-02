<?php

declare(strict_types=1);

namespace ShoppingCart\Cart;

interface ICartService
{
    public function insert(CartModel $model): int;

    public function update(CartModel $model): int;

    public function get(int $id): ?CartModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?CartModel;
}