<?php

declare(strict_types=1);

namespace ShoppingCart\ProductCategory;

class ProductCategoryDto 
{
    public int $id;
    public int $productId;
    public int $categoryId;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->productId = (int) ($row["product_id"] ?? 0);
        $this->categoryId = (int) ($row["category_id"] ?? 0);
    }
}