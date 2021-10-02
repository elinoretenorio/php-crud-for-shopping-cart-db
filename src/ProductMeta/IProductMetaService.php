<?php

declare(strict_types=1);

namespace ShoppingCart\ProductMeta;

interface IProductMetaService
{
    public function insert(ProductMetaModel $model): int;

    public function update(ProductMetaModel $model): int;

    public function get(int $id): ?ProductMetaModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?ProductMetaModel;
}