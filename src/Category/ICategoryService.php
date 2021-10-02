<?php

declare(strict_types=1);

namespace ShoppingCart\Category;

interface ICategoryService
{
    public function insert(CategoryModel $model): int;

    public function update(CategoryModel $model): int;

    public function get(int $id): ?CategoryModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?CategoryModel;
}