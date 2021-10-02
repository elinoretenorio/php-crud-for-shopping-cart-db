<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\ProductCategory;

use PHPUnit\Framework\TestCase;
use ShoppingCart\ProductCategory\{ ProductCategoryDto, ProductCategoryModel };

class ProductCategoryModelTest extends TestCase
{
    private array $input;
    private ProductCategoryDto $dto;
    private ProductCategoryModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 3562,
            "product_id" => 9042,
            "category_id" => 1909,
        ];
        $this->dto = new ProductCategoryDto($this->input);
        $this->model = new ProductCategoryModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new ProductCategoryModel(null);

        $this->assertInstanceOf(ProductCategoryModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 9971;
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
        $expected = 358;
        $model = $this->model;
        $model->setProductId($expected);

        $this->assertEquals($expected, $model->getProductId());
    }

    public function testGetCategoryId(): void
    {
        $this->assertEquals($this->dto->categoryId, $this->model->getCategoryId());
    }

    public function testSetCategoryId(): void
    {
        $expected = 9887;
        $model = $this->model;
        $model->setCategoryId($expected);

        $this->assertEquals($expected, $model->getCategoryId());
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