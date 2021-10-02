<?php

declare(strict_types=1);

namespace ShoppingCart\Category;

use JsonSerializable;

class CategoryModel implements JsonSerializable
{
    private int $id;
    private int $parentId;
    private string $title;
    private string $metaTitle;
    private string $slug;
    private string $content;

    public function __construct(CategoryDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->parentId = $dto->parentId;
        $this->title = $dto->title;
        $this->metaTitle = $dto->metaTitle;
        $this->slug = $dto->slug;
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

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function toDto(): CategoryDto
    {
        $dto = new CategoryDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->parentId = (int) ($this->parentId ?? 0);
        $dto->title = $this->title ?? "";
        $dto->metaTitle = $this->metaTitle ?? "";
        $dto->slug = $this->slug ?? "";
        $dto->content = $this->content ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "parent_id" => $this->parentId,
            "title" => $this->title,
            "meta_title" => $this->metaTitle,
            "slug" => $this->slug,
            "content" => $this->content,
        ];
    }
}