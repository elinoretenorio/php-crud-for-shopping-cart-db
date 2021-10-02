<?php

declare(strict_types=1);

namespace ShoppingCart\Product;

use JsonSerializable;

class ProductModel implements JsonSerializable
{
    private int $id;
    private int $userId;
    private string $title;
    private string $metaTitle;
    private string $slug;
    private string $summary;
    private int $type;
    private string $sku;
    private float $price;
    private float $discount;
    private int $quantity;
    private int $shop;
    private string $createdAt;
    private string $updatedAt;
    private string $publishedAt;
    private string $startsAt;
    private string $endsAt;
    private string $content;

    public function __construct(ProductDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->userId = $dto->userId;
        $this->title = $dto->title;
        $this->metaTitle = $dto->metaTitle;
        $this->slug = $dto->slug;
        $this->summary = $dto->summary;
        $this->type = $dto->type;
        $this->sku = $dto->sku;
        $this->price = $dto->price;
        $this->discount = $dto->discount;
        $this->quantity = $dto->quantity;
        $this->shop = $dto->shop;
        $this->createdAt = $dto->createdAt;
        $this->updatedAt = $dto->updatedAt;
        $this->publishedAt = $dto->publishedAt;
        $this->startsAt = $dto->startsAt;
        $this->endsAt = $dto->endsAt;
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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getMetaTitle(): string
    {
        return $this->metaTitle;
    }

    public function setMetaTitle(string $metaTitle): void
    {
        $this->metaTitle = $metaTitle;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    public function getSummary(): string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): void
    {
        $this->summary = $summary;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): void
    {
        $this->type = $type;
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

    public function getShop(): int
    {
        return $this->shop;
    }

    public function setShop(int $shop): void
    {
        $this->shop = $shop;
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

    public function getPublishedAt(): string
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(string $publishedAt): void
    {
        $this->publishedAt = $publishedAt;
    }

    public function getStartsAt(): string
    {
        return $this->startsAt;
    }

    public function setStartsAt(string $startsAt): void
    {
        $this->startsAt = $startsAt;
    }

    public function getEndsAt(): string
    {
        return $this->endsAt;
    }

    public function setEndsAt(string $endsAt): void
    {
        $this->endsAt = $endsAt;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function toDto(): ProductDto
    {
        $dto = new ProductDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->userId = (int) ($this->userId ?? 0);
        $dto->title = $this->title ?? "";
        $dto->metaTitle = $this->metaTitle ?? "";
        $dto->slug = $this->slug ?? "";
        $dto->summary = $this->summary ?? "";
        $dto->type = (int) ($this->type ?? 0);
        $dto->sku = $this->sku ?? "";
        $dto->price = (float) ($this->price ?? 0);
        $dto->discount = (float) ($this->discount ?? 0);
        $dto->quantity = (int) ($this->quantity ?? 0);
        $dto->shop = (int) ($this->shop ?? 0);
        $dto->createdAt = $this->createdAt ?? "";
        $dto->updatedAt = $this->updatedAt ?? "";
        $dto->publishedAt = $this->publishedAt ?? "";
        $dto->startsAt = $this->startsAt ?? "";
        $dto->endsAt = $this->endsAt ?? "";
        $dto->content = $this->content ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "user_id" => $this->userId,
            "title" => $this->title,
            "meta_title" => $this->metaTitle,
            "slug" => $this->slug,
            "summary" => $this->summary,
            "type" => $this->type,
            "sku" => $this->sku,
            "price" => $this->price,
            "discount" => $this->discount,
            "quantity" => $this->quantity,
            "shop" => $this->shop,
            "created_at" => $this->createdAt,
            "updated_at" => $this->updatedAt,
            "published_at" => $this->publishedAt,
            "starts_at" => $this->startsAt,
            "ends_at" => $this->endsAt,
            "content" => $this->content,
        ];
    }
}