<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\Order;

use PHPUnit\Framework\TestCase;
use ShoppingCart\Database\DatabaseException;
use ShoppingCart\Order\{ OrderDto, IOrderRepository, OrderRepository };

class OrderRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private OrderDto $dto;
    private IOrderRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("ShoppingCart\Database\IDatabase");
        $this->result = $this->createMock("ShoppingCart\Database\IDatabaseResult");
        $this->input = [
            "id" => 5965,
            "user_id" => 2486,
            "session_id" => "say",
            "token" => "old",
            "status" => 3012,
            "sub_total" => 783.00,
            "item_discount" => 913.19,
            "tax" => 913.70,
            "shipping" => 38.37,
            "total" => 171.00,
            "promo" => "set",
            "discount" => 818.60,
            "grand_total" => 599.00,
            "first_name" => "lawyer",
            "middle_name" => "will",
            "last_name" => "herself",
            "mobile" => "hundred",
            "email" => "pamela14@example.org",
            "line1" => "turn",
            "line2" => "sound",
            "city" => "old",
            "province" => "strategy",
            "country" => "save",
            "created_at" => "2021-09-25 04:50:43",
            "updated_at" => "2021-10-11 13:15:52",
            "content" => "If report feel side decide fund else section. What add week degree service. Drop better challenge character.",
        ];
        $this->dto = new OrderDto($this->input);
        $this->repository = new OrderRepository($this->db);
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
        $expected = 1373;

        $sql = "INSERT INTO `order` (`user_id`, `session_id`, `token`, `status`, `sub_total`, `item_discount`, `tax`, `shipping`, `total`, `promo`, `discount`, `grand_total`, `first_name`, `middle_name`, `last_name`, `mobile`, `email`, `line1`, `line2`, `city`, `province`, `country`, `created_at`, `updated_at`, `content`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->userId,
                $this->dto->sessionId,
                $this->dto->token,
                $this->dto->status,
                $this->dto->subTotal,
                $this->dto->itemDiscount,
                $this->dto->tax,
                $this->dto->shipping,
                $this->dto->total,
                $this->dto->promo,
                $this->dto->discount,
                $this->dto->grandTotal,
                $this->dto->firstName,
                $this->dto->middleName,
                $this->dto->lastName,
                $this->dto->mobile,
                $this->dto->email,
                $this->dto->line1,
                $this->dto->line2,
                $this->dto->city,
                $this->dto->province,
                $this->dto->country,
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
        $expected = 3509;

        $sql = "UPDATE `order` SET `user_id` = ?, `session_id` = ?, `token` = ?, `status` = ?, `sub_total` = ?, `item_discount` = ?, `tax` = ?, `shipping` = ?, `total` = ?, `promo` = ?, `discount` = ?, `grand_total` = ?, `first_name` = ?, `middle_name` = ?, `last_name` = ?, `mobile` = ?, `email` = ?, `line1` = ?, `line2` = ?, `city` = ?, `province` = ?, `country` = ?, `created_at` = ?, `updated_at` = ?, `content` = ?
                WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->userId,
                $this->dto->sessionId,
                $this->dto->token,
                $this->dto->status,
                $this->dto->subTotal,
                $this->dto->itemDiscount,
                $this->dto->tax,
                $this->dto->shipping,
                $this->dto->total,
                $this->dto->promo,
                $this->dto->discount,
                $this->dto->grandTotal,
                $this->dto->firstName,
                $this->dto->middleName,
                $this->dto->lastName,
                $this->dto->mobile,
                $this->dto->email,
                $this->dto->line1,
                $this->dto->line2,
                $this->dto->city,
                $this->dto->province,
                $this->dto->country,
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
        $id = 8059;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 7099;

        $sql = "SELECT `id`, `user_id`, `session_id`, `token`, `status`, `sub_total`, `item_discount`, `tax`, `shipping`, `total`, `promo`, `discount`, `grand_total`, `first_name`, `middle_name`, `last_name`, `mobile`, `email`, `line1`, `line2`, `city`, `province`, `country`, `created_at`, `updated_at`, `content`
                FROM `order` WHERE `id` = ?";

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
        $sql = "SELECT `id`, `user_id`, `session_id`, `token`, `status`, `sub_total`, `item_discount`, `tax`, `shipping`, `total`, `promo`, `discount`, `grand_total`, `first_name`, `middle_name`, `last_name`, `mobile`, `email`, `line1`, `line2`, `city`, `province`, `country`, `created_at`, `updated_at`, `content`
                FROM `order`";

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
        $id = 3301;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 211;
        $expected = 1216;

        $sql = "DELETE FROM `order` WHERE `id` = ?";

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