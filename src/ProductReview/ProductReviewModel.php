<?php

declare(strict_types=1);

namespace ShoppingCart\ProductReview;

use JsonSerializable;

class ProductReviewModel implements JsonSerializable
{
    private int $id;
    private int $productId;
    private int $parentId;
    private string $title;
    private int $rating;
    private int $published;
    private string $createdAt;
    private string $publishedAt;
    private string $content;

    public function __construct(ProductReviewDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->productId = $dto->productId;
        $this->parentId = $dto->parentId;
        $this->title = $dto->title;
        $this->rating = $dto->rating;
        $this->published = $dto->published;
        $this->createdAt = $dto->createdAt;
        $this->publishedAt = $dto->publishedAt;
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

    public function getParentId(): int
    {
        return $this->parentId;
    }

    public function setParentId(int $parentId): void
    {
        $this->parentId = $parentId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function setRating(int $rating): void
    {
        $this->rating = $rating;
    }

    public function getPublished(): int
    {
        return $this->published;
    }

    public function setPublished(int $published): void
    {
        $this->published = $published;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getPublishedAt(): string
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(string $publishedAt): void
    {
        $this->publishedAt = $publishedAt;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function toDto(): ProductReviewDto
    {
        $dto = new ProductReviewDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->productId = (int) ($this->productId ?? 0);
        $dto->parentId = (int) ($this->parentId ?? 0);
        $dto->title = $this->title ?? "";
        $dto->rating = (int) ($this->rating ?? 0);
        $dto->published = (int) ($this->published ?? 0);
        $dto->createdAt = $this->createdAt ?? "";
        $dto->publishedAt = $this->publishedAt ?? "";
        $dto->content = $this->content ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "product_id" => $this->productId,
            "parent_id" => $this->parentId,
            "title" => $this->title,
            "rating" => $this->rating,
            "published" => $this->published,
            "created_at" => $this->createdAt,
            "published_at" => $this->publishedAt,
            "content" => $this->content,
        ];
    }
}