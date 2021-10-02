<?php

declare(strict_types=1);

namespace ShoppingCart\CartItem;

use ShoppingCart\Database\IDatabase;
use ShoppingCart\Database\DatabaseException;

class CartItemRepository implements ICartItemRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(CartItemDto $dto): int
    {
        $sql = "INSERT INTO `cart_item` (`product_id`, `cart_id`, `sku`, `price`, `discount`, `quantity`, `active`, `created_at`, `updated_at`, `content`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->productId,
                $dto->cartId,
                $dto->sku,
                $dto->price,
                $dto->discount,
                $dto->quantity,
                $dto->active,
                $dto->createdAt,
                $dto->updatedAt,
                $dto->content
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(CartItemDto $dto): int
    {
        $sql = "UPDATE `cart_item` SET `product_id` = ?, `cart_id` = ?, `sku` = ?, `price` = ?, `discount` = ?, `quantity` = ?, `active` = ?, `created_at` = ?, `updated_at` = ?, `content` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->productId,
                $dto->cartId,
                $dto->sku,
                $dto->price,
                $dto->discount,
                $dto->quantity,
                $dto->active,
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

    public function get(int $id): ?CartItemDto
    {
        $sql = "SELECT `id`, `product_id`, `cart_id`, `sku`, `price`, `discount`, `quantity`, `active`, `created_at`, `updated_at`, `content`
                FROM `cart_item` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new CartItemDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `product_id`, `cart_id`, `sku`, `price`, `discount`, `quantity`, `active`, `created_at`, `updated_at`, `content`
                FROM `cart_item`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new CartItemDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `cart_item` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}