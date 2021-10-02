<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\OrderItem;

use PHPUnit\Framework\TestCase;
use ShoppingCart\Database\DatabaseException;
use ShoppingCart\OrderItem\{ OrderItemDto, IOrderItemRepository, OrderItemRepository };

class OrderItemRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private OrderItemDto $dto;
    private IOrderItemRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("ShoppingCart\Database\IDatabase");
        $this->result = $this->createMock("ShoppingCart\Database\IDatabaseResult");
        $this->input = [
            "id" => 4804,
            "product_id" => 2153,
            "order_id" => 2144,
            "sku" => "police",
            "price" => 847.35,
            "discount" => 101.45,
            "quantity" => 2785,
            "created_at" => "2021-09-26 15:08:06",
            "updated_at" => "2021-10-03 03:11:58",
            "content" => "Worry guy clear off. Area produce feel method across meet. Despite executive space do describe economy item.",
        ];
        $this->dto = new OrderItemDto($this->input);
        $this->repository = new OrderItemRepository($this->db);
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
        $expected = 7708;

        $sql = "INSERT INTO `order_item` (`product_id`, `order_id`, `sku`, `price`, `discount`, `quantity`, `created_at`, `updated_at`, `content`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->productId,
                $this->dto->orderId,
                $this->dto->sku,
                $this->dto->price,
                $this->dto->discount,
                $this->dto->quantity,
                $this->dto->createdAt,
                $this->dto->updatedAt,
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
        $expected = 4472;

        $sql = "UPDATE `order_item` SET `product_id` = ?, `order_id` = ?, `sku` = ?, `price` = ?, `discount` = ?, `quantity` = ?, `created_at` = ?, `updated_at` = ?, `content` = ?
                WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->productId,
                $this->dto->orderId,
                $this->dto->sku,
                $this->dto->price,
                $this->dto->discount,
                $this->dto->quantity,
                $this->dto->createdAt,
                $this->dto->updatedAt,
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
        $id = 289;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 932;

        $sql = "SELECT `id`, `product_id`, `order_id`, `sku`, `price`, `discount`, `quantity`, `created_at`, `updated_at`, `content`
                FROM `order_item` WHERE `id` = ?";

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
        $sql = "SELECT `id`, `product_id`, `order_id`, `sku`, `price`, `discount`, `quantity`, `created_at`, `updated_at`, `content`
                FROM `order_item`";

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
        $id = 670;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 9055;
        $expected = 8106;

        $sql = "DELETE FROM `order_item` WHERE `id` = ?";

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