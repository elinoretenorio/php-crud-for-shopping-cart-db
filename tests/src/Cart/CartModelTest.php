<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\Cart;

use PHPUnit\Framework\TestCase;
use ShoppingCart\Cart\{ CartDto, CartModel };

class CartModelTest extends TestCase
{
    private array $input;
    private CartDto $dto;
    private CartModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 9972,
            "user_id" => 4727,
            "session_id" => "somebody",
            "token" => "bed",
            "status" => 8290,
            "first_name" => "benefit",
            "middle_name" => "big",
            "last_name" => "compare",
            "mobile" => "great",
            "email" => "martinezjack@example.org",
            "line1" => "free",
            "line2" => "seven",
            "city" => "character",
            "province" => "hold",
            "country" => "pattern",
            "created_at" => "2021-10-13 05:28:28",
            "updated_at" => "2021-09-19 02:54:08",
            "content" => "Look finish happy. Clearly through politics modern day writer prepare.",
        ];
        $this->dto = new CartDto($this->input);
        $this->model = new CartModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new CartModel(null);

        $this->assertInstanceOf(CartModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 765;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetUserId(): void
    {
        $this->assertEquals($this->dto->userId, $this->model->getUserId());
    }

    public function testSetUserId(): void
    {
        $expected = 2651;
        $model = $this->model;
        $model->setUserId($expected);

        $this->assertEquals($expected, $model->getUserId());
    }

    public function testGetSessionId(): void
    {
        $this->assertEquals($this->dto->sessionId, $this->model->getSessionId());
    }

    public function testSetSessionId(): void
    {
        $expected = "she";
        $model = $this->model;
        $model->setSessionId($expected);

        $this->assertEquals($expected, $model->getSessionId());
    }

    public function testGetToken(): void
    {
        $this->assertEquals($this->dto->token, $this->model->getToken());
    }

    public function testSetToken(): void
    {
        $expected = "low";
        $model = $this->model;
        $model->setToken($expected);

        $this->assertEquals($expected, $model->getToken());
    }

    public function testGetStatus(): void
    {
        $this->assertEquals($this->dto->status, $this->model->getStatus());
    }

    public function testSetStatus(): void
    {
        $expected = 6666;
        $model = $this->model;
        $model->setStatus($expected);

        $this->assertEquals($expected, $model->getStatus());
    }

    public function testGetFirstName(): void
    {
        $this->assertEquals($this->dto->firstName, $this->model->getFirstName());
    }

    public function testSetFirstName(): void
    {
        $expected = "think";
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
        $expected = "threat";
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
        $expected = "federal";
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
        $expected = "born";
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
        $expected = "franklinraymond@example.org";
        $model = $this->model;
        $model->setEmail($expected);

        $this->assertEquals($expected, $model->getEmail());
    }

    public function testGetLine1(): void
    {
        $this->assertEquals($this->dto->line1, $this->model->getLine1());
    }

    public function testSetLine1(): void
    {
        $expected = "case";
        $model = $this->model;
        $model->setLine1($expected);

        $this->assertEquals($expected, $model->getLine1());
    }

    public function testGetLine2(): void
    {
        $this->assertEquals($this->dto->line2, $this->model->getLine2());
    }

    public function testSetLine2(): void
    {
        $expected = "too";
        $model = $this->model;
        $model->setLine2($expected);

        $this->assertEquals($expected, $model->getLine2());
    }

    public function testGetCity(): void
    {
        $this->assertEquals($this->dto->city, $this->model->getCity());
    }

    public function testSetCity(): void
    {
        $expected = "another";
        $model = $this->model;
        $model->setCity($expected);

        $this->assertEquals($expected, $model->getCity());
    }

    public function testGetProvince(): void
    {
        $this->assertEquals($this->dto->province, $this->model->getProvince());
    }

    public function testSetProvince(): void
    {
        $expected = "huge";
        $model = $this->model;
        $model->setProvince($expected);

        $this->assertEquals($expected, $model->getProvince());
    }

    public function testGetCountry(): void
    {
        $this->assertEquals($this->dto->country, $this->model->getCountry());
    }

    public function testSetCountry(): void
    {
        $expected = "political";
        $model = $this->model;
        $model->setCountry($expected);

        $this->assertEquals($expected, $model->getCountry());
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals($this->dto->createdAt, $this->model->getCreatedAt());
    }

    public function testSetCreatedAt(): void
    {
        $expected = "2021-09-18 18:14:39";
        $model = $this->model;
        $model->setCreatedAt($expected);

        $this->assertEquals($expected, $model->getCreatedAt());
    }

    public function testGetUpdatedAt(): void
    {
        $this->assertEquals($this->dto->updatedAt, $this->model->getUpdatedAt());
    }

    public function testSetUpdatedAt(): void
    {
        $expected = "2021-09-30 09:09:01";
        $model = $this->model;
        $model->setUpdatedAt($expected);

        $this->assertEquals($expected, $model->getUpdatedAt());
    }

    public function testGetContent(): void
    {
        $this->assertEquals($this->dto->content, $this->model->getContent());
    }

    public function testSetContent(): void
    {
        $expected = "Reflect shake heavy care PM training natural so. Grow Democrat yes become wind wide. Station participant pretty minute rule not per. Audience result any people TV end or top.";
        $model = $this->model;
        $model->setContent($expected);

        $this->assertEquals($expected, $model->getContent());
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