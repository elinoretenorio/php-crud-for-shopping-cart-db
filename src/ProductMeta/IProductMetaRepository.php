<?php

declare(strict_types=1);

namespace ShoppingCart\ProductMeta;

interface IProductMetaRepository
{
    public function insert(ProductMetaDto $dto): int;

    public function update(ProductMetaDto $dto): int;

    public function get(int $id): ?ProductMetaDto;

    public function getAll(): array;

    public function delete(int $id): int;
}