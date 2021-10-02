<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\Transaction;

use PHPUnit\Framework\TestCase;
use ShoppingCart\Database\DatabaseException;
use ShoppingCart\Transaction\{ TransactionDto, ITransactionRepository, TransactionRepository };

class TransactionRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private TransactionDto $dto;
    private ITransactionRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("ShoppingCart\Database\IDatabase");
        $this->result = $this->createMock("ShoppingCart\Database\IDatabaseResult");
        $this->input = [
            "id" => 7983,
            "user_id" => 1155,
            "order_id" => 6900,
            "code" => "natural",
            "type" => 8802,
            "mode" => 561,
            "status" => 9827,
            "created_at" => "2021-10-07 02:43:57",
            "updated_at" => "2021-09-18 22:37:53",
            "content" => "Shoulder season pretty effort order. Rise either skin option make. For show recognize able.",
        ];
        $this->dto = new TransactionDto($this->input);
        $this->repository = new TransactionRepository($this->db);
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
        $expected = 8589;

        $sql = "INSERT INTO `transaction` (`user_id`, `order_id`, `code`, `type`, `mode`, `status`, `created_at`, `updated_at`, `content`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->userId,
                $this->dto->orderId,
                $this->dto->code,
                $this->dto->type,
                $this->dto->mode,
                $this->dto->status,
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
        $expected = 3591;

        $sql = "UPDATE `transaction` SET `user_id` = ?, `order_id` = ?, `code` = ?, `type` = ?, `mode` = ?, `status` = ?, `created_at` = ?, `updated_at` = ?, `content` = ?
                WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->userId,
                $this->dto->orderId,
                $this->dto->code,
                $this->dto->type,
                $this->dto->mode,
                $this->dto->status,
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
        $id = 8784;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 4564;

        $sql = "SELECT `id`, `user_id`, `order_id`, `code`, `type`, `mode`, `status`, `created_at`, `updated_at`, `content`
                FROM `transaction` WHERE `id` = ?";

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
        $sql = "SELECT `id`, `user_id`, `order_id`, `code`, `type`, `mode`, `status`, `created_at`, `updated_at`, `content`
                FROM `transaction`";

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
        $id = 6216;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 3146;
        $expected = 2400;

        $sql = "DELETE FROM `transaction` WHERE `id` = ?";

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