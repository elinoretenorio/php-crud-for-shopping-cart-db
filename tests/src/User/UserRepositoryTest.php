<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\User;

use PHPUnit\Framework\TestCase;
use ShoppingCart\Database\DatabaseException;
use ShoppingCart\User\{ UserDto, IUserRepository, UserRepository };

class UserRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private UserDto $dto;
    private IUserRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("ShoppingCart\Database\IDatabase");
        $this->result = $this->createMock("ShoppingCart\Database\IDatabaseResult");
        $this->input = [
            "id" => 4250,
            "first_name" => "many",
            "middle_name" => "party",
            "last_name" => "share",
            "mobile" => "Republican",
            "email" => "rmorris@example.com",
            "password_hash" => "meeting",
            "admin" => 6933,
            "vendor" => 983,
            "registered_at" => "2021-10-06 23:29:18",
            "last_login" => "2021-10-05 10:45:49",
            "intro" => "College quality national day during spring.",
            "profile" => "Continue notice scene here air peace oil. Turn time expert side. Space each tree sit develop.",
        ];
        $this->dto = new UserDto($this->input);
        $this->repository = new UserRepository($this->db);
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
        $expected = 4174;

        $sql = "INSERT INTO `user` (`first_name`, `middle_name`, `last_name`, `mobile`, `email`, `password_hash`, `admin`, `vendor`, `registered_at`, `last_login`, `intro`, `profile`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->firstName,
                $this->dto->middleName,
                $this->dto->lastName,
                $this->dto->mobile,
                $this->dto->email,
                $this->dto->passwordHash,
                $this->dto->admin,
                $this->dto->vendor,
                $this->dto->registeredAt,
                $this->dto->lastLogin,
                $this->dto->intro,
                $this->dto->profile
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
        $expected = 2928;

        $sql = "UPDATE `user` SET `first_name` = ?, `middle_name` = ?, `last_name` = ?, `mobile` = ?, `email` = ?, `password_hash` = ?, `admin` = ?, `vendor` = ?, `registered_at` = ?, `last_login` = ?, `intro` = ?, `profile` = ?
                WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->firstName,
                $this->dto->middleName,
                $this->dto->lastName,
                $this->dto->mobile,
                $this->dto->email,
                $this->dto->passwordHash,
                $this->dto->admin,
                $this->dto->vendor,
                $this->dto->registeredAt,
                $this->dto->lastLogin,
                $this->dto->intro,
                $this->dto->profile,
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
        $id = 1331;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 7711;

        $sql = "SELECT `id`, `first_name`, `middle_name`, `last_name`, `mobile`, `email`, `password_hash`, `admin`, `vendor`, `registered_at`, `last_login`, `intro`, `profile`
                FROM `user` WHERE `id` = ?";

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
        $sql = "SELECT `id`, `first_name`, `middle_name`, `last_name`, `mobile`, `email`, `password_hash`, `admin`, `vendor`, `registered_at`, `last_login`, `intro`, `profile`
                FROM `user`";

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
        $id = 4815;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 4465;
        $expected = 9677;

        $sql = "DELETE FROM `user` WHERE `id` = ?";

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