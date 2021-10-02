<?php

declare(strict_types=1);

namespace ShoppingCart\OrderItem;

use ShoppingCart\Database\IDatabase;
use ShoppingCart\Database\DatabaseException;

class OrderItemRepository implements IOrderItemRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(OrderItemDto $dto): int
    {
        $sql = "INSERT INTO `order_item` (`product_id`, `order_id`, `sku`, `price`, `discount`, `quantity`, `created_at`, `updated_at`, `content`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->productId,
                $dto->orderId,
                $dto->sku,
                $dto->price,
                $dto->discount,
                $dto->quantity,
                $dto->createdAt,
                $dto->updatedAt,
                $dto->content
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(OrderItemDto $dto): int
    {
        $sql = "UPDATE `order_item` SET `product_id` = ?, `order_id` = ?, `sku` = ?, `price` = ?, `discount` = ?, `quantity` = ?, `created_at` = ?, `updated_at` = ?, `content` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->productId,
                $dto->orderId,
                $dto->sku,
                $dto->price,
                $dto->discount,
                $dto->quantity,
                $dto->createdAt,
                $dto->updatedAt,
                $dto->content,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?OrderItemDto
    {
        $sql = "SELECT `id`, `product_id`, `order_id`, `sku`, `price`, `discount`, `quantity`, `created_at`, `updated_at`, `content`
                FROM `order_item` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new OrderItemDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `product_id`, `order_id`, `sku`, `price`, `discount`, `quantity`, `created_at`, `updated_at`, `content`
                FROM `order_item`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new OrderItemDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `order_item` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}