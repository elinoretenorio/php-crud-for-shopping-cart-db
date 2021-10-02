<?php

declare(strict_types=1);

namespace ShoppingCart\ProductMeta;

class ProductMetaDto 
{
    public int $id;
    public int $productId;
    public string $key;
    public string $content;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->productId = (int) ($row["product_id"] ?? 0);
        $this->key = $row["key"] ?? "";
        $this->content = $row["content"] ?? "";
    }
}