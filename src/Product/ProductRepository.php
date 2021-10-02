<?php

declare(strict_types=1);

namespace ShoppingCart\Product;

use ShoppingCart\Database\IDatabase;
use ShoppingCart\Database\DatabaseException;

class ProductRepository implements IProductRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(ProductDto $dto): int
    {
        $sql = "INSERT INTO `product` (`user_id`, `title`, `meta_title`, `slug`, `summary`, `type`, `sku`, `price`, `discount`, `quantity`, `shop`, `created_at`, `updated_at`, `published_at`, `starts_at`, `ends_at`, `content`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->userId,
                $dto->title,
                $dto->metaTitle,
                $dto->slug,
                $dto->summary,
                $dto->type,
                $dto->sku,
                $dto->price,
                $dto->discount,
                $dto->quantity,
                $dto->shop,
                $dto->createdAt,
                $dto->updatedAt,
                $dto->publishedAt,
                $dto->startsAt,
                $dto->endsAt,
                $dto->content
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(ProductDto $dto): int
    {
        $sql = "UPDATE `product` SET `user_id` = ?, `title` = ?, `meta_title` = ?, `slug` = ?, `summary` = ?, `type` = ?, `sku` = ?, `price` = ?, `discount` = ?, `quantity` = ?, `shop` = ?, `created_at` = ?, `updated_at` = ?, `published_at` = ?, `starts_at` = ?, `ends_at` = ?, `content` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->userId,
                $dto->title,
                $dto->metaTitle,
                $dto->slug,
                $dto->summary,
                $dto->type,
                $dto->sku,
                $dto->price,
                $dto->discount,
                $dto->quantity,
                $dto->shop,
                $dto->createdAt,
                $dto->updatedAt,
                $dto->publishedAt,
                $dto->startsAt,
                $dto->endsAt,
                $dto->content,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?ProductDto
    {
        $sql = "SELECT `id`, `user_id`, `title`, `meta_title`, `slug`, `summary`, `type`, `sku`, `price`, `discount`, `quantity`, `shop`, `created_at`, `updated_at`, `published_at`, `starts_at`, `ends_at`, `content`
                FROM `product` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new ProductDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `user_id`, `title`, `meta_title`, `slug`, `summary`, `type`, `sku`, `price`, `discount`, `quantity`, `shop`, `created_at`, `updated_at`, `published_at`, `starts_at`, `ends_at`, `content`
                FROM `product`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new ProductDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `product` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}