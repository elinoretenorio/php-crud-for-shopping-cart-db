<?php

declare(strict_types=1);

namespace ShoppingCart\ProductCategory;

interface IProductCategoryService
{
    public function insert(ProductCategoryModel $model): int;

    public function update(ProductCategoryModel $model): int;

    public function get(int $id): ?ProductCategoryModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?ProductCategoryModel;
}