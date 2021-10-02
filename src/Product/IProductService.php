<?php

declare(strict_types=1);

namespace ShoppingCart\Product;

interface IProductService
{
    public function insert(ProductModel $model): int;

    public function update(ProductModel $model): int;

    public function get(int $id): ?ProductModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?ProductModel;
}