<?php

declare(strict_types=1);

namespace ShoppingCart\Transaction;

class TransactionDto 
{
    public int $id;
    public int $userId;
    public int $orderId;
    public string $code;
    public int $type;
    public int $mode;
    public int $status;
    public string $createdAt;
    public string $updatedAt;
    public string $content;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->userId = (int) ($row["user_id"] ?? 0);
        $this->orderId = (int) ($row["order_id"] ?? 0);
        $this->code = $row["code"] ?? "";
        $this->type = (int) ($row["type"] ?? 0);
        $this->mode = (int) ($row["mode"] ?? 0);
        $this->status = (int) ($row["status"] ?? 0);
        $this->createdAt = $row["created_at"] ?? "";
        $this->updatedAt = $row["updated_at"] ?? "";
        $this->content = $row["content"] ?? "";
    }
}