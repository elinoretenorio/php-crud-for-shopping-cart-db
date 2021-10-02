<?php

declare(strict_types=1);

namespace ShoppingCart\Product;

interface IProductRepository
{
    public function insert(ProductDto $dto): int;

    public function update(ProductDto $dto): int;

    public function get(int $id): ?ProductDto;

    public function getAll(): array;

    public function delete(int $id): int;
}