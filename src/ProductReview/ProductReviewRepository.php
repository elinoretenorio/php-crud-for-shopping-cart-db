<?php

declare(strict_types=1);

namespace ShoppingCart\ProductReview;

use ShoppingCart\Database\IDatabase;
use ShoppingCart\Database\DatabaseException;

class ProductReviewRepository implements IProductReviewRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(ProductReviewDto $dto): int
    {
        $sql = "INSERT INTO `product_review` (`product_id`, `parent_id`, `title`, `rating`, `published`, `created_at`, `published_at`, `content`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->productId,
                $dto->parentId,
                $dto->title,
                $dto->rating,
                $dto->published,
                $dto->createdAt,
                $dto->publishedAt,
                $dto->content
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(ProductReviewDto $dto): int
    {
        $sql = "UPDATE `product_review` SET `product_id` = ?, `parent_id` = ?, `title` = ?, `rating` = ?, `published` = ?, `created_at` = ?, `published_at` = ?, `content` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->productId,
                $dto->parentId,
                $dto->title,
                $dto->rating,
                $dto->published,
                $dto->createdAt,
                $dto->publishedAt,
                $dto->content,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?ProductReviewDto
    {
        $sql = "SELECT `id`, `product_id`, `parent_id`, `title`, `rating`, `published`, `created_at`, `published_at`, `content`
                FROM `product_review` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new ProductReviewDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `product_id`, `parent_id`, `title`, `rating`, `published`, `created_at`, `published_at`, `content`
                FROM `product_review`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new ProductReviewDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `product_review` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}