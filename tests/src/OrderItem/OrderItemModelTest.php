<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\OrderItem;

use PHPUnit\Framework\TestCase;
use ShoppingCart\OrderItem\{ OrderItemDto, OrderItemModel };

class OrderItemModelTest extends TestCase
{
    private array $input;
    private OrderItemDto $dto;
    private OrderItemModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 7018,
            "product_id" => 9328,
            "order_id" => 1668,
            "sku" => "easy",
            "price" => 523.00,
            "discount" => 621.37,
            "quantity" => 4695,
            "created_at" => "2021-09-22 09:27:18",
            "updated_at" => "2021-09-30 19:25:07",
            "content" => "Whether thousand part past necessary. Hear natural deal herself medical other win six. Become discover store.",
        ];
        $this->dto = new OrderItemDto($this->input);
        $this->model = new OrderItemModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OrderItemModel(null);

        $this->assertInstanceOf(OrderItemModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 1086;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetProductId(): void
    {
        $this->assertEquals($this->dto->productId, $this->model->getProductId());
    }

    public function testSetProductId(): void
    {
        $expected = 8935;
        $model = $this->model;
        $model->setProductId($expected);

        $this->assertEquals($expected, $model->getProductId());
    }

    public function testGetOrderId(): void
    {
        $this->assertEquals($this->dto->orderId, $this->model->getOrderId());
    }

    public function testSetOrderId(): void
    {
        $expected = 5860;
        $model = $this->model;
        $model->setOrderId($expected);

        $this->assertEquals($expected, $model->getOrderId());
    }

    public function testGetSku(): void
    {
        $this->assertEquals($this->dto->sku, $this->model->getSku());
    }

    public function testSetSku(): void
    {
        $expected = "decade";
        $model = $this->model;
        $model->setSku($expected);

        $this->assertEquals($expected, $model->getSku());
    }

    public function testGetPrice(): void
    {
        $this->assertEquals($this->dto->price, $this->model->getPrice());
    }

    public function testSetPrice(): void
    {
        $expected = 627.10;
        $model = $this->model;
        $model->setPrice($expected);

        $this->assertEquals($expected, $model->getPrice());
    }

    public function testGetDiscount(): void
    {
        $this->assertEquals($this->dto->discount, $this->model->getDiscount());
    }

    public function testSetDiscount(): void
    {
        $expected = 38.81;
        $model = $this->model;
        $model->setDiscount($expected);

        $this->assertEquals($expected, $model->getDiscount());
    }

    public function testGetQuantity(): void
    {
        $this->assertEquals($this->dto->quantity, $this->model->getQuantity());
    }

    public function testSetQuantity(): void
    {
        $expected = 7877;
        $model = $this->model;
        $model->setQuantity($expected);

        $this->assertEquals($expected, $model->getQuantity());
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals($this->dto->createdAt, $this->model->getCreatedAt());
    }

    public function testSetCreatedAt(): void
    {
        $expected = "2021-10-10 09:40:17";
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
        $expected = "2021-10-14 02:23:10";
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
        $expected = "Team detail sure support that trouble. Positive democratic get enter road admit tree. Security final hope present do.";
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