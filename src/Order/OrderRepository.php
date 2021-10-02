<?php

declare(strict_types=1);

namespace ShoppingCart\Order;

use ShoppingCart\Database\IDatabase;
use ShoppingCart\Database\DatabaseException;

class OrderRepository implements IOrderRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(OrderDto $dto): int
    {
        $sql = "INSERT INTO `order` (`user_id`, `session_id`, `token`, `status`, `sub_total`, `item_discount`, `tax`, `shipping`, `total`, `promo`, `discount`, `grand_total`, `first_name`, `middle_name`, `last_name`, `mobile`, `email`, `line1`, `line2`, `city`, `province`, `country`, `created_at`, `updated_at`, `content`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->userId,
                $dto->sessionId,
                $dto->token,
                $dto->status,
                $dto->subTotal,
                $dto->itemDiscount,
                $dto->tax,
                $dto->shipping,
                $dto->total,
                $dto->promo,
                $dto->discount,
                $dto->grandTotal,
                $dto->firstName,
                $dto->middleName,
                $dto->lastName,
                $dto->mobile,
                $dto->email,
                $dto->line1,
                $dto->line2,
                $dto->city,
                $dto->province,
                $dto->country,
                $dto->createdAt,
                $dto->updatedAt,
                $dto->content
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(OrderDto $dto): int
    {
        $sql = "UPDATE `order` SET `user_id` = ?, `session_id` = ?, `token` = ?, `status` = ?, `sub_total` = ?, `item_discount` = ?, `tax` = ?, `shipping` = ?, `total` = ?, `promo` = ?, `discount` = ?, `grand_total` = ?, `first_name` = ?, `middle_name` = ?, `last_name` = ?, `mobile` = ?, `email` = ?, `line1` = ?, `line2` = ?, `city` = ?, `province` = ?, `country` = ?, `created_at` = ?, `updated_at` = ?, `content` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->userId,
                $dto->sessionId,
                $dto->token,
                $dto->status,
                $dto->subTotal,
                $dto->itemDiscount,
                $dto->tax,
                $dto->shipping,
                $dto->total,
                $dto->promo,
                $dto->discount,
                $dto->grandTotal,
                $dto->firstName,
                $dto->middleName,
                $dto->lastName,
                $dto->mobile,
                $dto->email,
                $dto->line1,
                $dto->line2,
                $dto->city,
                $dto->province,
                $dto->country,
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

    public function get(int $id): ?OrderDto
    {
        $sql = "SELECT `id`, `user_id`, `session_id`, `token`, `status`, `sub_total`, `item_discount`, `tax`, `shipping`, `total`, `promo`, `discount`, `grand_total`, `first_name`, `middle_name`, `last_name`, `mobile`, `email`, `line1`, `line2`, `city`, `province`, `country`, `created_at`, `updated_at`, `content`
                FROM `order` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new OrderDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `user_id`, `session_id`, `token`, `status`, `sub_total`, `item_discount`, `tax`, `shipping`, `total`, `promo`, `discount`, `grand_total`, `first_name`, `middle_name`, `last_name`, `mobile`, `email`, `line1`, `line2`, `city`, `province`, `country`, `created_at`, `updated_at`, `content`
                FROM `order`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new OrderDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `order` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}