<?php

declare(strict_types=1);

namespace ShoppingCart\ProductReview;

class ProductReviewDto 
{
    public int $id;
    public int $productId;
    public int $parentId;
    public string $title;
    public int $rating;
    public int $published;
    public string $createdAt;
    public string $publishedAt;
    public string $content;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->productId = (int) ($row["product_id"] ?? 0);
        $this->parentId = (int) ($row["parent_id"] ?? 0);
        $this->title = $row["title"] ?? "";
        $this->rating = (int) ($row["rating"] ?? 0);
        $this->published = (int) ($row["published"] ?? 0);
        $this->createdAt = $row["created_at"] ?? "";
        $this->publishedAt = $row["published_at"] ?? "";
        $this->content = $row["content"] ?? "";
    }
}