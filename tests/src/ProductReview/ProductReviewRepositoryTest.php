<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\ProductReview;

use PHPUnit\Framework\TestCase;
use ShoppingCart\Database\DatabaseException;
use ShoppingCart\ProductReview\{ ProductReviewDto, IProductReviewRepository, ProductReviewRepository };

class ProductReviewRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private ProductReviewDto $dto;
    private IProductReviewRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("ShoppingCart\Database\IDatabase");
        $this->result = $this->createMock("ShoppingCart\Database\IDatabaseResult");
        $this->input = [
            "id" => 1902,
            "product_id" => 8429,
            "parent_id" => 4016,
            "title" => "none",
            "rating" => 998,
            "published" => 6721,
            "created_at" => "2021-10-06 19:10:15",
            "published_at" => "2021-10-18 00:55:46",
            "content" => "Best day leave white.",
        ];
        $this->dto = new ProductReviewDto($this->input);
        $this->repository = new ProductReviewRepository($this->db);
    }

    protected function tearDown(): void
    {
        unset($this->db);
        unset($this->result);
        unset($this->input);
        unset($this->dto);
        unset($this->repository);
    }

    public function testInsert_ReturnsFailedOnException(): void
    {
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->insert($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testInsert_ReturnsId(): void
    {
        $expected = 7007;

        $sql = "INSERT INTO `product_review` (`product_id`, `parent_id`, `title`, `rating`, `published`, `created_at`, `published_at`, `content`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->productId,
                $this->dto->parentId,
                $this->dto->title,
                $this->dto->rating,
                $this->dto->published,
                $this->dto->createdAt,
                $this->dto->publishedAt,
                $this->dto->content
            ]);
        $this->db->expects($this->once())
            ->method("lastInsertId")
            ->willReturn($expected);

        $actual = $this->repository->insert($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testUpdate_ReturnsFailedOnException(): void
    {
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->update($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testUpdate_ReturnsRowCount(): void
    {
        $expected = 8066;

        $sql = "UPDATE `product_review` SET `product_id` = ?, `parent_id` = ?, `title` = ?, `rating` = ?, `published` = ?, `created_at` = ?, `published_at` = ?, `content` = ?
                WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->productId,
                $this->dto->parentId,
                $this->dto->title,
                $this->dto->rating,
                $this->dto->published,
                $this->dto->createdAt,
                $this->dto->publishedAt,
                $this->dto->content,
                $this->dto->id
            ]);
        $this->result->expects($this->once())
            ->method("rowCount")
            ->willReturn($expected);

        $actual = $this->repository->update($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testGet_ReturnsEmptyOnException(): void
    {
        $id = 1056;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 6702;

        $sql = "SELECT `id`, `product_id`, `parent_id`, `title`, `rating`, `published`, `created_at`, `published_at`, `content`
                FROM `product_review` WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([$id]);
        $this->result->expects($this->once())
            ->method("fetchAll")
            ->willReturn([$this->input]);

        $actual = $this->repository->get($id);
        $this->assertEquals($this->dto, $actual);
    }

    public function testGetAll_ReturnsEmptyOnException(): void
    {
        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->getAll();
        $this->assertEmpty($actual);
    }

    public function testGetAll_ReturnsDtos(): void
    {
        $sql = "SELECT `id`, `product_id`, `parent_id`, `title`, `rating`, `published`, `created_at`, `published_at`, `content`
                FROM `product_review`";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute");
        $this->result->expects($this->once())
            ->method("fetchAll")
            ->willReturn([$this->input]);

        $actual = $this->repository->getAll();
        $this->assertEquals([$this->dto], $actual);
    }

    public function testDelete_ReturnsFailedOnException(): void
    {
        $id = 5200;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 448;
        $expected = 6911;

        $sql = "DELETE FROM `product_review` WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([$id]);
        $this->result->expects($this->once())
            ->method("rowCount")
            ->willReturn($expected);

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }
}