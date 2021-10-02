<?php

declare(strict_types=1);

namespace ShoppingCart\Category;

class CategoryDto 
{
    public int $id;
    public int $parentId;
    public string $title;
    public string $metaTitle;
    public string $slug;
    public string $content;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->parentId = (int) ($row["parent_id"] ?? 0);
        $this->title = $row["title"] ?? "";
        $this->metaTitle = $row["meta_title"] ?? "";
        $this->slug = $row["slug"] ?? "";
        $this->content = $row["content"] ?? "";
    }
}