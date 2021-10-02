<?php

declare(strict_types=1);

namespace ShoppingCart\OrderItem;

use JsonSerializable;

class OrderItemModel implements JsonSerializable
{
    private int $id;
    private int $productId;
    private int $orderId;
    private string $sku;
    private float $price;
    private float $discount;
    private int $quantity;
    private string $createdAt;
    private string $updatedAt;
    private string $content;

    public function __construct(OrderItemDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->productId = $dto->productId;
        $this->orderId = $dto->orderId;
        $this->sku = $dto->sku;
        $this->price = $dto->price;
        $this->discount = $dto->discount;
        $this->quantity = $dto->quantity;
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

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getDiscount(): float
    {
        return $this->discount;
    }

    public function setDiscount(float $discount): void
    {
        $this->discount = $discount;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
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

    public function toDto(): OrderItemDto
    {
        $dto = new OrderItemDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->productId = (int) ($this->productId ?? 0);
        $dto->orderId = (int) ($this->orderId ?? 0);
        $dto->sku = $this->sku ?? "";
        $dto->price = (float) ($this->price ?? 0);
        $dto->discount = (float) ($this->discount ?? 0);
        $dto->quantity = (int) ($this->quantity ?? 0);
        $dto->createdAt = $this->createdAt ?? "";
        $dto->updatedAt = $this->updatedAt ?? "";
        $dto->content = $this->content ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "product_id" => $this->productId,
            "order_id" => $this->orderId,
            "sku" => $this->sku,
            "price" => $this->price,
            "discount" => $this->discount,
            "quantity" => $this->quantity,
            "created_at" => $this->createdAt,
            "updated_at" => $this->updatedAt,
            "content" => $this->content,
        ];
    }
}