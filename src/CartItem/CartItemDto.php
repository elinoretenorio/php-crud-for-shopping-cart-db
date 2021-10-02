<?php

declare(strict_types=1);

namespace ShoppingCart\CartItem;

class CartItemDto 
{
    public int $id;
    public int $productId;
    public int $cartId;
    public string $sku;
    public float $price;
    public float $discount;
    public int $quantity;
    public int $active;
    public string $createdAt;
    public string $updatedAt;
    public string $content;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->productId = (int) ($row["product_id"] ?? 0);
        $this->cartId = (int) ($row["cart_id"] ?? 0);
        $this->sku = $row["sku"] ?? "";
        $this->price = (float) ($row["price"] ?? 0);
        $this->discount = (float) ($row["discount"] ?? 0);
        $this->quantity = (int) ($row["quantity"] ?? 0);
        $this->active = (int) ($row["active"] ?? 0);
        $this->createdAt = $row["created_at"] ?? "";
        $this->updatedAt = $row["updated_at"] ?? "";
        $this->content = $row["content"] ?? "";
    }
}