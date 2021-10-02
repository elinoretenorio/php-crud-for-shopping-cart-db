<?php

declare(strict_types=1);

namespace ShoppingCart\Category;

interface ICategoryRepository
{
    public function insert(CategoryDto $dto): int;

    public function update(CategoryDto $dto): int;

    public function get(int $id): ?CategoryDto;

    public function getAll(): array;

    public function delete(int $id): int;
}