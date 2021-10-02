<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\Order;

use PHPUnit\Framework\TestCase;
use ShoppingCart\Order\{ OrderDto, OrderModel };

class OrderModelTest extends TestCase
{
    private array $input;
    private OrderDto $dto;
    private OrderModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 5274,
            "user_id" => 7683,
            "session_id" => "that",
            "token" => "book",
            "status" => 8259,
            "sub_total" => 386.00,
            "item_discount" => 516.00,
            "tax" => 663.65,
            "shipping" => 891.63,
            "total" => 552.51,
            "promo" => "follow",
            "discount" => 121.00,
            "grand_total" => 308.70,
            "first_name" => "order",
            "middle_name" => "growth",
            "last_name" => "pull",
            "mobile" => "meeting",
            "email" => "martinamanda@example.com",
            "line1" => "stop",
            "line2" => "design",
            "city" => "item",
            "province" => "wear",
            "country" => "firm",
            "created_at" => "2021-10-16 05:42:59",
            "updated_at" => "2021-09-20 00:01:23",
            "content" => "Mother our conference Mr their fish view. Check above skill example space none foot full.",
        ];
        $this->dto = new OrderDto($this->input);
        $this->model = new OrderModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OrderModel(null);

        $this->assertInstanceOf(OrderModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 2345;
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
        $expected = 9202;
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
        $expected = "affect";
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
        $expected = "structure";
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
        $expected = 3775;
        $model = $this->model;
        $model->setStatus($expected);

        $this->assertEquals($expected, $model->getStatus());
    }

    public function testGetSubTotal(): void
    {
        $this->assertEquals($this->dto->subTotal, $this->model->getSubTotal());
    }

    public function testSetSubTotal(): void
    {
        $expected = 5.79;
        $model = $this->model;
        $model->setSubTotal($expected);

        $this->assertEquals($expected, $model->getSubTotal());
    }

    public function testGetItemDiscount(): void
    {
        $this->assertEquals($this->dto->itemDiscount, $this->model->getItemDiscount());
    }

    public function testSetItemDiscount(): void
    {
        $expected = 97.49;
        $model = $this->model;
        $model->setItemDiscount($expected);

        $this->assertEquals($expected, $model->getItemDiscount());
    }

    public function testGetTax(): void
    {
        $this->assertEquals($this->dto->tax, $this->model->getTax());
    }

    public function testSetTax(): void
    {
        $expected = 282.66;
        $model = $this->model;
        $model->setTax($expected);

        $this->assertEquals($expected, $model->getTax());
    }

    public function testGetShipping(): void
    {
        $this->assertEquals($this->dto->shipping, $this->model->getShipping());
    }

    public function testSetShipping(): void
    {
        $expected = 841.48;
        $model = $this->model;
        $model->setShipping($expected);

        $this->assertEquals($expected, $model->getShipping());
    }

    public function testGetTotal(): void
    {
        $this->assertEquals($this->dto->total, $this->model->getTotal());
    }

    public function testSetTotal(): void
    {
        $expected = 22.20;
        $model = $this->model;
        $model->setTotal($expected);

        $this->assertEquals($expected, $model->getTotal());
    }

    public function testGetPromo(): void
    {
        $this->assertEquals($this->dto->promo, $this->model->getPromo());
    }

    public function testSetPromo(): void
    {
        $expected = "third";
        $model = $this->model;
        $model->setPromo($expected);

        $this->assertEquals($expected, $model->getPromo());
    }

    public function testGetDiscount(): void
    {
        $this->assertEquals($this->dto->discount, $this->model->getDiscount());
    }

    public function testSetDiscount(): void
    {
        $expected = 63.67;
        $model = $this->model;
        $model->setDiscount($expected);

        $this->assertEquals($expected, $model->getDiscount());
    }

    public function testGetGrandTotal(): void
    {
        $this->assertEquals($this->dto->grandTotal, $this->model->getGrandTotal());
    }

    public function testSetGrandTotal(): void
    {
        $expected = 118.20;
        $model = $this->model;
        $model->setGrandTotal($expected);

        $this->assertEquals($expected, $model->getGrandTotal());
    }

    public function testGetFirstName(): void
    {
        $this->assertEquals($this->dto->firstName, $this->model->getFirstName());
    }

    public function testSetFirstName(): void
    {
        $expected = "something";
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
        $expected = "language";
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
        $expected = "much";
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
        $expected = "already";
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
        $expected = "simscharles@example.com";
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
        $expected = "painting";
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
        $expected = "see";
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
        $expected = "nor";
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
        $expected = "page";
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
        $expected = "order";
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
        $expected = "2021-09-28 00:35:03";
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
        $expected = "2021-09-27 11:32:43";
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
        $expected = "Success remember leave my long. Among continue subject business.";
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