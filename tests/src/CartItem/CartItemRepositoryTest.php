<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\CartItem;

use PHPUnit\Framework\TestCase;
use ShoppingCart\Database\DatabaseException;
use ShoppingCart\CartItem\{ CartItemDto, ICartItemRepository, CartItemRepository };

class CartItemRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private CartItemDto $dto;
    private ICartItemRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("ShoppingCart\Database\IDatabase");
        $this->result = $this->createMock("ShoppingCart\Database\IDatabaseResult");
        $this->input = [
            "id" => 3311,
            "product_id" => 2568,
            "cart_id" => 8172,
            "sku" => "series",
            "price" => 482.99,
            "discount" => 726.56,
            "quantity" => 6136,
            "active" => 7759,
            "created_at" => "2021-10-13 18:41:57",
            "updated_at" => "2021-09-18 16:48:53",
            "content" => "Million agent soldier likely or consumer hour accept. Choice amount north difficult generation may. Daughter owner particular young true.",
        ];
        $this->dto = new CartItemDto($this->input);
        $this->repository = new CartItemRepository($this->db);
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
        $expected = 267;

        $sql = "INSERT INTO `cart_item` (`product_id`, `cart_id`, `sku`, `price`, `discount`, `quantity`, `active`, `created_at`, `updated_at`, `content`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->productId,
                $this->dto->cartId,
                $this->dto->sku,
                $this->dto->price,
                $this->dto->discount,
                $this->dto->quantity,
                $this->dto->active,
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
        $expected = 7621;

        $sql = "UPDATE `cart_item` SET `product_id` = ?, `cart_id` = ?, `sku` = ?, `price` = ?, `discount` = ?, `quantity` = ?, `active` = ?, `created_at` = ?, `updated_at` = ?, `content` = ?
                WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->productId,
                $this->dto->cartId,
                $this->dto->sku,
                $this->dto->price,
                $this->dto->discount,
                $this->dto->quantity,
                $this->dto->active,
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
        $id = 4692;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 2971;

        $sql = "SELECT `id`, `product_id`, `cart_id`, `sku`, `price`, `discount`, `quantity`, `active`, `created_at`, `updated_at`, `content`
                FROM `cart_item` WHERE `id` = ?";

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
        $sql = "SELECT `id`, `product_id`, `cart_id`, `sku`, `price`, `discount`, `quantity`, `active`, `created_at`, `updated_at`, `content`
                FROM `cart_item`";

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
        $id = 4799;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 4143;
        $expected = 644;

        $sql = "DELETE FROM `cart_item` WHERE `id` = ?";

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