<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\Cart;

use PHPUnit\Framework\TestCase;
use ShoppingCart\Database\DatabaseException;
use ShoppingCart\Cart\{ CartDto, ICartRepository, CartRepository };

class CartRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private CartDto $dto;
    private ICartRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("ShoppingCart\Database\IDatabase");
        $this->result = $this->createMock("ShoppingCart\Database\IDatabaseResult");
        $this->input = [
            "id" => 1139,
            "user_id" => 7641,
            "session_id" => "manager",
            "token" => "opportunity",
            "status" => 9381,
            "first_name" => "there",
            "middle_name" => "middle",
            "last_name" => "almost",
            "mobile" => "man",
            "email" => "david00@example.org",
            "line1" => "whether",
            "line2" => "however",
            "city" => "action",
            "province" => "new",
            "country" => "will",
            "created_at" => "2021-10-18 04:10:00",
            "updated_at" => "2021-10-16 04:11:53",
            "content" => "Scientist then pay know option. Likely seem loss and friend choice next. Brother some him today strategy attack paper.",
        ];
        $this->dto = new CartDto($this->input);
        $this->repository = new CartRepository($this->db);
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
        $expected = 7688;

        $sql = "INSERT INTO `cart` (`user_id`, `session_id`, `token`, `status`, `first_name`, `middle_name`, `last_name`, `mobile`, `email`, `line1`, `line2`, `city`, `province`, `country`, `created_at`, `updated_at`, `content`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

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
        $expected = 934;

        $sql = "UPDATE `cart` SET `user_id` = ?, `session_id` = ?, `token` = ?, `status` = ?, `first_name` = ?, `middle_name` = ?, `last_name` = ?, `mobile` = ?, `email` = ?, `line1` = ?, `line2` = ?, `city` = ?, `province` = ?, `country` = ?, `created_at` = ?, `updated_at` = ?, `content` = ?
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
        $id = 2631;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 7390;

        $sql = "SELECT `id`, `user_id`, `session_id`, `token`, `status`, `first_name`, `middle_name`, `last_name`, `mobile`, `email`, `line1`, `line2`, `city`, `province`, `country`, `created_at`, `updated_at`, `content`
                FROM `cart` WHERE `id` = ?";

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
        $sql = "SELECT `id`, `user_id`, `session_id`, `token`, `status`, `first_name`, `middle_name`, `last_name`, `mobile`, `email`, `line1`, `line2`, `city`, `province`, `country`, `created_at`, `updated_at`, `content`
                FROM `cart`";

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
        $id = 5785;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 5434;
        $expected = 7197;

        $sql = "DELETE FROM `cart` WHERE `id` = ?";

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