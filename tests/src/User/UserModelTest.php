<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\User;

use PHPUnit\Framework\TestCase;
use ShoppingCart\User\{ UserDto, UserModel };

class UserModelTest extends TestCase
{
    private array $input;
    private UserDto $dto;
    private UserModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 5784,
            "first_name" => "work",
            "middle_name" => "example",
            "last_name" => "behind",
            "mobile" => "term",
            "email" => "heather66@example.com",
            "password_hash" => "party",
            "admin" => 253,
            "vendor" => 4347,
            "registered_at" => "2021-10-10 04:39:53",
            "last_login" => "2021-09-20 13:22:06",
            "intro" => "Can time southern only oil gun.",
            "profile" => "There sometimes project mother drop special. Continue two pattern fish character wrong.",
        ];
        $this->dto = new UserDto($this->input);
        $this->model = new UserModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new UserModel(null);

        $this->assertInstanceOf(UserModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 2496;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetFirstName(): void
    {
        $this->assertEquals($this->dto->firstName, $this->model->getFirstName());
    }

    public function testSetFirstName(): void
    {
        $expected = "rest";
        $model = $this->model;
        $model->setFirstName($expected);

        $this->assertEquals($expected, $model->getFirstName());
    }

    public function testGetMiddleName(): void
    {
        $this->assertEquals($this->dto->middleName, $this->model->getMiddleName());
    }

    public function testSetMiddleName(): void
    {
        $expected = "old";
        $model = $this->model;
        $model->setMiddleName($expected);

        $this->assertEquals($expected, $model->getMiddleName());
    }

    public function testGetLastName(): void
    {
        $this->assertEquals($this->dto->lastName, $this->model->getLastName());
    }

    public function testSetLastName(): void
    {
        $expected = "force";
        $model = $this->model;
        $model->setLastName($expected);

        $this->assertEquals($expected, $model->getLastName());
    }

    public function testGetMobile(): void
    {
        $this->assertEquals($this->dto->mobile, $this->model->getMobile());
    }

    public function testSetMobile(): void
    {
        $expected = "standard";
        $model = $this->model;
        $model->setMobile($expected);

        $this->assertEquals($expected, $model->getMobile());
    }

    public function testGetEmail(): void
    {
        $this->assertEquals($this->dto->email, $this->model->getEmail());
    }

    public function testSetEmail(): void
    {
        $expected = "patricia10@example.org";
        $model = $this->model;
        $model->setEmail($expected);

        $this->assertEquals($expected, $model->getEmail());
    }

    public function testGetPasswordHash(): void
    {
        $this->assertEquals($this->dto->passwordHash, $this->model->getPasswordHash());
    }

    public function testSetPasswordHash(): void
    {
        $expected = "though";
        $model = $this->model;
        $model->setPasswordHash($expected);

        $this->assertEquals($expected, $model->getPasswordHash());
    }

    public function testGetAdmin(): void
    {
        $this->assertEquals($this->dto->admin, $this->model->getAdmin());
    }

    public function testSetAdmin(): void
    {
        $expected = 4447;
        $model = $this->model;
        $model->setAdmin($expected);

        $this->assertEquals($expected, $model->getAdmin());
    }

    public function testGetVendor(): void
    {
        $this->assertEquals($this->dto->vendor, $this->model->getVendor());
    }

    public function testSetVendor(): void
    {
        $expected = 73;
        $model = $this->model;
        $model->setVendor($expected);

        $this->assertEquals($expected, $model->getVendor());
    }

    public function testGetRegisteredAt(): void
    {
        $this->assertEquals($this->dto->registeredAt, $this->model->getRegisteredAt());
    }

    public function testSetRegisteredAt(): void
    {
        $expected = "2021-10-12 18:11:06";
        $model = $this->model;
        $model->setRegisteredAt($expected);

        $this->assertEquals($expected, $model->getRegisteredAt());
    }

    public function testGetLastLogin(): void
    {
        $this->assertEquals($this->dto->lastLogin, $this->model->getLastLogin());
    }

    public function testSetLastLogin(): void
    {
        $expected = "2021-10-04 16:47:03";
        $model = $this->model;
        $model->setLastLogin($expected);

        $this->assertEquals($expected, $model->getLastLogin());
    }

    public function testGetIntro(): void
    {
        $this->assertEquals($this->dto->intro, $this->model->getIntro());
    }

    public function testSetIntro(): void
    {
        $expected = "Box happy even ask.";
        $model = $this->model;
        $model->setIntro($expected);

        $this->assertEquals($expected, $model->getIntro());
    }

    public function testGetProfile(): void
    {
        $this->assertEquals($this->dto->profile, $this->model->getProfile());
    }

    public function testSetProfile(): void
    {
        $expected = "Throw toward body it science all. Political structure your board girl. Site grow leader direction various beautiful room.";
        $model = $this->model;
        $model->setProfile($expected);

        $this->assertEquals($expected, $model->getProfile());
    }

    public function testToDto(): void
    {
        $this->assertEquals($this->dto, $this->model->toDto());
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals($this->input, $this->model->jsonSerialize());
    }
}