<?php

declare(strict_types=1);

namespace ShoppingCart\ProductReview;

interface IProductReviewService
{
    public function insert(ProductReviewModel $model): int;

    public function update(ProductReviewModel $model): int;

    public function get(int $id): ?ProductReviewModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?ProductReviewModel;
}