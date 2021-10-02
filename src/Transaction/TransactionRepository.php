<?php

declare(strict_types=1);

namespace ShoppingCart\Transaction;

use ShoppingCart\Database\IDatabase;
use ShoppingCart\Database\DatabaseException;

class TransactionRepository implements ITransactionRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(TransactionDto $dto): int
    {
        $sql = "INSERT INTO `transaction` (`user_id`, `order_id`, `code`, `type`, `mode`, `status`, `created_at`, `updated_at`, `content`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->userId,
                $dto->orderId,
                $dto->code,
                $dto->type,
                $dto->mode,
                $dto->status,
                $dto->createdAt,
                $dto->updatedAt,
                $dto->content
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(TransactionDto $dto): int
    {
        $sql = "UPDATE `transaction` SET `user_id` = ?, `order_id` = ?, `code` = ?, `type` = ?, `mode` = ?, `status` = ?, `created_at` = ?, `updated_at` = ?, `content` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->userId,
                $dto->orderId,
                $dto->code,
                $dto->type,
                $dto->mode,
                $dto->status,
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

    public function get(int $id): ?TransactionDto
    {
        $sql = "SELECT `id`, `user_id`, `order_id`, `code`, `type`, `mode`, `status`, `created_at`, `updated_at`, `content`
                FROM `transaction` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new TransactionDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `user_id`, `order_id`, `code`, `type`, `mode`, `status`, `created_at`, `updated_at`, `content`
                FROM `transaction`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new TransactionDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `transaction` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}