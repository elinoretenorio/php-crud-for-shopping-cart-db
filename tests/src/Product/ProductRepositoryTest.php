<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\Product;

use PHPUnit\Framework\TestCase;
use ShoppingCart\Database\DatabaseException;
use ShoppingCart\Product\{ ProductDto, IProductRepository, ProductRepository };

class ProductRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private ProductDto $dto;
    private IProductRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("ShoppingCart\Database\IDatabase");
        $this->result = $this->createMock("ShoppingCart\Database\IDatabaseResult");
        $this->input = [
            "id" => 3995,
            "user_id" => 2232,
            "title" => "commercial",
            "meta_title" => "about",
            "slug" => "happy",
            "summary" => "Market candidate bill throughout per project bank.",
            "type" => 4156,
            "sku" => "sister",
            "price" => 385.60,
            "discount" => 576.76,
            "quantity" => 9068,
            "shop" => 3332,
            "created_at" => "2021-10-06 10:23:52",
            "updated_at" => "2021-09-21 20:55:03",
            "published_at" => "2021-10-02 12:03:56",
            "starts_at" => "2021-09-22 15:29:01",
            "ends_at" => "2021-10-13 09:00:32",
            "content" => "Nor general opportunity mission tax. Site knowledge poor rather none heavy third. Thus sign design son future produce leader blue.",
        ];
        $this->dto = new ProductDto($this->input);
        $this->repository = new ProductRepository($this->db);
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
        $expected = 9320;

        $sql = "INSERT INTO `product` (`user_id`, `title`, `meta_title`, `slug`, `summary`, `type`, `sku`, `price`, `discount`, `quantity`, `shop`, `created_at`, `updated_at`, `published_at`, `starts_at`, `ends_at`, `content`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->userId,
                $this->dto->title,
                $this->dto->metaTitle,
                $this->dto->slug,
                $this->dto->summary,
                $this->dto->type,
                $this->dto->sku,
                $this->dto->price,
                $this->dto->discount,
                $this->dto->quantity,
                $this->dto->shop,
                $this->dto->createdAt,
                $this->dto->updatedAt,
                $this->dto->publishedAt,
                $this->dto->startsAt,
                $this->dto->endsAt,
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
        $expected = 5560;

        $sql = "UPDATE `product` SET `user_id` = ?, `title` = ?, `meta_title` = ?, `slug` = ?, `summary` = ?, `type` = ?, `sku` = ?, `price` = ?, `discount` = ?, `quantity` = ?, `shop` = ?, `created_at` = ?, `updated_at` = ?, `published_at` = ?, `starts_at` = ?, `ends_at` = ?, `content` = ?
                WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->userId,
                $this->dto->title,
                $this->dto->metaTitle,
                $this->dto->slug,
                $this->dto->summary,
                $this->dto->type,
                $this->dto->sku,
                $this->dto->price,
                $this->dto->discount,
                $this->dto->quantity,
                $this->dto->shop,
                $this->dto->createdAt,
                $this->dto->updatedAt,
                $this->dto->publishedAt,
                $this->dto->startsAt,
                $this->dto->endsAt,
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
        $id = 1084;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 6503;

        $sql = "SELECT `id`, `user_id`, `title`, `meta_title`, `slug`, `summary`, `type`, `sku`, `price`, `discount`, `quantity`, `shop`, `created_at`, `updated_at`, `published_at`, `starts_at`, `ends_at`, `content`
                FROM `product` WHERE `id` = ?";

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
        $sql = "SELECT `id`, `user_id`, `title`, `meta_title`, `slug`, `summary`, `type`, `sku`, `price`, `discount`, `quantity`, `shop`, `created_at`, `updated_at`, `published_at`, `starts_at`, `ends_at`, `content`
                FROM `product`";

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
        $id = 8895;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 1839;
        $expected = 4899;

        $sql = "DELETE FROM `product` WHERE `id` = ?";

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