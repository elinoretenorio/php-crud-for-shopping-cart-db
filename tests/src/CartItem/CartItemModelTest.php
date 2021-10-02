<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\CartItem;

use PHPUnit\Framework\TestCase;
use ShoppingCart\CartItem\{ CartItemDto, CartItemModel };

class CartItemModelTest extends TestCase
{
    private array $input;
    private CartItemDto $dto;
    private CartItemModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 7456,
            "product_id" => 5407,
            "cart_id" => 3031,
            "sku" => "cover",
            "price" => 69.78,
            "discount" => 563.59,
            "quantity" => 7071,
            "active" => 5616,
            "created_at" => "2021-10-02 10:18:33",
            "updated_at" => "2021-09-23 06:46:20",
            "content" => "Your center church none series benefit. Fear view and goal.",
        ];
        $this->dto = new CartItemDto($this->input);
        $this->model = new CartItemModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new CartItemModel(null);

        $this->assertInstanceOf(CartItemModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 4973;
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
        $expected = 4217;
        $model = $this->model;
        $model->setProductId($expected);

        $this->assertEquals($expected, $model->getProductId());
    }

    public function testGetCartId(): void
    {
        $this->assertEquals($this->dto->cartId, $this->model->getCartId());
    }

    public function testSetCartId(): void
    {
        $expected = 2245;
        $model = $this->model;
        $model->setCartId($expected);

        $this->assertEquals($expected, $model->getCartId());
    }

    public function testGetSku(): void
    {
        $this->assertEquals($this->dto->sku, $this->model->getSku());
    }

    public function testSetSku(): void
    {
        $expected = "use";
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
        $expected = 479.50;
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
        $expected = 915.00;
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
        $expected = 3601;
        $model = $this->model;
        $model->setQuantity($expected);

        $this->assertEquals($expected, $model->getQuantity());
    }

    public function testGetActive(): void
    {
        $this->assertEquals($this->dto->active, $this->model->getActive());
    }

    public function testSetActive(): void
    {
        $expected = 7914;
        $model = $this->model;
        $model->setActive($expected);

        $this->assertEquals($expected, $model->getActive());
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals($this->dto->createdAt, $this->model->getCreatedAt());
    }

    public function testSetCreatedAt(): void
    {
        $expected = "2021-09-20 06:08:13";
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
        $expected = "2021-09-21 17:56:41";
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
        $expected = "Traditional deep different strong. Response feel always somebody attorney partner. Amount star where marriage.";
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