<?php

declare(strict_types=1);

namespace ShoppingCart\ProductReview;

interface IProductReviewRepository
{
    public function insert(ProductReviewDto $dto): int;

    public function update(ProductReviewDto $dto): int;

    public function get(int $id): ?ProductReviewDto;

    public function getAll(): array;

    public function delete(int $id): int;
}