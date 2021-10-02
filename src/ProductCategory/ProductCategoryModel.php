<?php

declare(strict_types=1);

namespace ShoppingCart\ProductCategory;

use JsonSerializable;

class ProductCategoryModel implements JsonSerializable
{
    private int $id;
    private int $productId;
    private int $categoryId;

    public function __construct(ProductCategoryDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->productId = $dto->productId;
        $this->categoryId = $dto->categoryId;
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

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    public function toDto(): ProductCategoryDto
    {
        $dto = new ProductCategoryDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->productId = (int) ($this->productId ?? 0);
        $dto->categoryId = (int) ($this->categoryId ?? 0);

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "product_id" => $this->productId,
            "category_id" => $this->categoryId,
        ];
    }
}