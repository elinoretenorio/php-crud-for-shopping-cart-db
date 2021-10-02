<?php

declare(strict_types=1);

namespace ShoppingCart\ProductMeta;

use JsonSerializable;

class ProductMetaModel implements JsonSerializable
{
    private int $id;
    private int $productId;
    private string $key;
    private string $content;

    public function __construct(ProductMetaDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->productId = $dto->productId;
        $this->key = $dto->key;
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

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function toDto(): ProductMetaDto
    {
        $dto = new ProductMetaDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->productId = (int) ($this->productId ?? 0);
        $dto->key = $this->key ?? "";
        $dto->content = $this->content ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "product_id" => $this->productId,
            "key" => $this->key,
            "content" => $this->content,
        ];
    }
}