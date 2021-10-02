<?php

declare(strict_types=1);

namespace ShoppingCart\Category;

use ShoppingCart\Database\IDatabase;
use ShoppingCart\Database\DatabaseException;

class CategoryRepository implements ICategoryRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(CategoryDto $dto): int
    {
        $sql = "INSERT INTO `category` (`parent_id`, `title`, `meta_title`, `slug`, `content`)
                VALUES (?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->parentId,
                $dto->title,
                $dto->metaTitle,
                $dto->slug,
                $dto->content
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(CategoryDto $dto): int
    {
        $sql = "UPDATE `category` SET `parent_id` = ?, `title` = ?, `meta_title` = ?, `slug` = ?, `content` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->parentId,
                $dto->title,
                $dto->metaTitle,
                $dto->slug,
                $dto->content,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?CategoryDto
    {
        $sql = "SELECT `id`, `parent_id`, `title`, `meta_title`, `slug`, `content`
                FROM `category` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new CategoryDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `parent_id`, `title`, `meta_title`, `slug`, `content`
                FROM `category`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new CategoryDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `category` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}