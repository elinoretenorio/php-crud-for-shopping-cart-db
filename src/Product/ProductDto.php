<?php

declare(strict_types=1);

namespace ShoppingCart\Product;

class ProductDto 
{
    public int $id;
    public int $userId;
    public string $title;
    public string $metaTitle;
    public string $slug;
    public string $summary;
    public int $type;
    public string $sku;
    public float $price;
    public float $discount;
    public int $quantity;
    public int $shop;
    public string $createdAt;
    public string $updatedAt;
    public string $publishedAt;
    public string $startsAt;
    public string $endsAt;
    public string $content;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->userId = (int) ($row["user_id"] ?? 0);
        $this->title = $row["title"] ?? "";
        $this->metaTitle = $row["meta_title"] ?? "";
        $this->slug = $row["slug"] ?? "";
        $this->summary = $row["summary"] ?? "";
        $this->type = (int) ($row["type"] ?? 0);
        $this->sku = $row["sku"] ?? "";
        $this->price = (float) ($row["price"] ?? 0);
        $this->discount = (float) ($row["discount"] ?? 0);
        $this->quantity = (int) ($row["quantity"] ?? 0);
        $this->shop = (int) ($row["shop"] ?? 0);
        $this->createdAt = $row["created_at"] ?? "";
        $this->updatedAt = $row["updated_at"] ?? "";
        $this->publishedAt = $row["published_at"] ?? "";
        $this->startsAt = $row["starts_at"] ?? "";
        $this->endsAt = $row["ends_at"] ?? "";
        $this->content = $row["content"] ?? "";
    }
}