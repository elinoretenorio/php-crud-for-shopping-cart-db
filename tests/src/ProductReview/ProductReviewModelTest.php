<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\ProductReview;

use PHPUnit\Framework\TestCase;
use ShoppingCart\ProductReview\{ ProductReviewDto, ProductReviewModel };

class ProductReviewModelTest extends TestCase
{
    private array $input;
    private ProductReviewDto $dto;
    private ProductReviewModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 6422,
            "product_id" => 4914,
            "parent_id" => 8034,
            "title" => "trade",
            "rating" => 6174,
            "published" => 6368,
            "created_at" => "2021-10-06 12:28:01",
            "published_at" => "2021-10-03 21:16:25",
            "content" => "Mrs room daughter management various class campaign. Its television organization decide. Bag newspaper rise opportunity environmental.",
        ];
        $this->dto = new ProductReviewDto($this->input);
        $this->model = new ProductReviewModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new ProductReviewModel(null);

        $this->assertInstanceOf(ProductReviewModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 9638;
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
        $expected = 9663;
        $model = $this->model;
        $model->setProductId($expected);

        $this->assertEquals($expected, $model->getProductId());
    }

    public function testGetParentId(): void
    {
        $this->assertEquals($this->dto->parentId, $this->model->getParentId());
    }

    public function testSetParentId(): void
    {
        $expected = 8497;
        $model = $this->model;
        $model->setParentId($expected);

        $this->assertEquals($expected, $model->getParentId());
    }

    public function testGetTitle(): void
    {
        $this->assertEquals($this->dto->title, $this->model->getTitle());
    }

    public function testSetTitle(): void
    {
        $expected = "camera";
        $model = $this->model;
        $model->setTitle($expected);

        $this->assertEquals($expected, $model->getTitle());
    }

    public function testGetRating(): void
    {
        $this->assertEquals($this->dto->rating, $this->model->getRating());
    }

    public function testSetRating(): void
    {
        $expected = 4775;
        $model = $this->model;
        $model->setRating($expected);

        $this->assertEquals($expected, $model->getRating());
    }

    public function testGetPublished(): void
    {
        $this->assertEquals($this->dto->published, $this->model->getPublished());
    }

    public function testSetPublished(): void
    {
        $expected = 4018;
        $model = $this->model;
        $model->setPublished($expected);

        $this->assertEquals($expected, $model->getPublished());
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals($this->dto->createdAt, $this->model->getCreatedAt());
    }

    public function testSetCreatedAt(): void
    {
        $expected = "2021-09-30 05:25:44";
        $model = $this->model;
        $model->setCreatedAt($expected);

        $this->assertEquals($expected, $model->getCreatedAt());
    }

    public function testGetPublishedAt(): void
    {
        $this->assertEquals($this->dto->publishedAt, $this->model->getPublishedAt());
    }

    public function testSetPublishedAt(): void
    {
        $expected = "2021-10-15 07:33:08";
        $model = $this->model;
        $model->setPublishedAt($expected);

        $this->assertEquals($expected, $model->getPublishedAt());
    }

    public function testGetContent(): void
    {
        $this->assertEquals($this->dto->content, $this->model->getContent());
    }

    public function testSetContent(): void
    {
        $expected = "Study during improve tax full billion. Avoid past customer activity.";
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