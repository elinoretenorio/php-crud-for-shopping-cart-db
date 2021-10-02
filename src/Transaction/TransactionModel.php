<?php

declare(strict_types=1);

namespace ShoppingCart\Transaction;

use JsonSerializable;

class TransactionModel implements JsonSerializable
{
    private int $id;
    private int $userId;
    private int $orderId;
    private string $code;
    private int $type;
    private int $mode;
    private int $status;
    private string $createdAt;
    private string $updatedAt;
    private string $content;

    public function __construct(TransactionDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->userId = $dto->userId;
        $this->orderId = $dto->orderId;
        $this->code = $dto->code;
        $this->type = $dto->type;
        $this->mode = $dto->mode;
        $this->status = $dto->status;
        $this->createdAt = $dto->createdAt;
        $this->updatedAt = $dto->updatedAt;
        $this->content = $dto->content;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): void
    {
        $this->type = $type;
    }

    public function getMode(): int
    {
        return $this->mode;
    }

    public function setMode(int $mode): void
    {
        $this->mode = $mode;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function toDto(): TransactionDto
    {
        $dto = new TransactionDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->userId = (int) ($this->userId ?? 0);
        $dto->orderId = (int) ($this->orderId ?? 0);
        $dto->code = $this->code ?? "";
        $dto->type = (int) ($this->type ?? 0);
        $dto->mode = (int) ($this->mode ?? 0);
        $dto->status = (int) ($this->status ?? 0);
        $dto->createdAt = $this->createdAt ?? "";
        $dto->updatedAt = $this->updatedAt ?? "";
        $dto->content = $this->content ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "user_id" => $this->userId,
            "order_id" => $this->orderId,
            "code" => $this->code,
            "type" => $this->type,
            "mode" => $this->mode,
            "status" => $this->status,
            "created_at" => $this->createdAt,
            "updated_at" => $this->updatedAt,
            "content" => $this->content,
        ];
    }
}