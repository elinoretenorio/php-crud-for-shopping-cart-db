<?php

declare(strict_types=1);

namespace ShoppingCart\ProductCategory;

interface IProductCategoryRepository
{
    public function insert(ProductCategoryDto $dto): int;

    public function update(ProductCategoryDto $dto): int;

    public function get(int $id): ?ProductCategoryDto;

    public function getAll(): array;

    public function delete(int $id): int;
}