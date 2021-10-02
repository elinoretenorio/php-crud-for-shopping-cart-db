<?php

declare(strict_types=1);

namespace ShoppingCart\ProductReview;

class ProductReviewService implements IProductReviewService
{
    private IProductReviewRepository $repository;

    public function __construct(IProductReviewRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(ProductReviewModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(ProductReviewModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?ProductReviewModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new ProductReviewModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var ProductReviewDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new ProductReviewModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?ProductReviewModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new ProductReviewDto($row);

        return new ProductReviewModel($dto);
    }
}