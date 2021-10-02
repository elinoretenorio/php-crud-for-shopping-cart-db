<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\ProductMeta;

use PHPUnit\Framework\TestCase;
use ShoppingCart\ProductMeta\{ ProductMetaDto, ProductMetaModel };

class ProductMetaModelTest extends TestCase
{
    private array $input;
    private ProductMetaDto $dto;
    private ProductMetaModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 6149,
            "product_id" => 9220,
            "key" => "trip",
            "content" => "Sit talk us white detail sure. Way total role decision she we.",
        ];
        $this->dto = new ProductMetaDto($this->input);
        $this->model = new ProductMetaModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new ProductMetaModel(null);

        $this->assertInstanceOf(ProductMetaModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 3566;
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
        $expected = 7706;
        $model = $this->model;
        $model->setProductId($expected);

        $this->assertEquals($expected, $model->getProductId());
    }

    public function testGetKey(): void
    {
        $this->assertEquals($this->dto->key, $this->model->getKey());
    }

    public function testSetKey(): void
    {
        $expected = "public";
        $model = $this->model;
        $model->setKey($expected);

        $this->assertEquals($expected, $model->getKey());
    }

    public function testGetContent(): void
    {
        $this->assertEquals($this->dto->content, $this->model->getContent());
    }

    public function testSetContent(): void
    {
        $expected = "First simply wrong involve. Hot alone perform.";
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