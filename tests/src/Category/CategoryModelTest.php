<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\Category;

use PHPUnit\Framework\TestCase;
use ShoppingCart\Category\{ CategoryDto, CategoryModel };

class CategoryModelTest extends TestCase
{
    private array $input;
    private CategoryDto $dto;
    private CategoryModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 3898,
            "parent_id" => 1236,
            "title" => "place",
            "meta_title" => "take",
            "slug" => "social",
            "content" => "Lead to across mind partner drug. Account such center official simple table game.",
        ];
        $this->dto = new CategoryDto($this->input);
        $this->model = new CategoryModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new CategoryModel(null);

        $this->assertInstanceOf(CategoryModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 3120;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetParentId(): void
    {
        $this->assertEquals($this->dto->parentId, $this->model->getParentId());
    }

    public function testSetParentId(): void
    {
        $expected = 1802;
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
        $expected = "pressure";
        $model = $this->model;
        $model->setTitle($expected);

        $this->assertEquals($expected, $model->getTitle());
    }

    public function testGetMetaTitle(): void
    {
        $this->assertEquals($this->dto->metaTitle, $this->model->getMetaTitle());
    }

    public function testSetMetaTitle(): void
    {
        $expected = "read";
        $model = $this->model;
        $model->setMetaTitle($expected);

        $this->assertEquals($expected, $model->getMetaTitle());
    }

    public function testGetSlug(): void
    {
        $this->assertEquals($this->dto->slug, $this->model->getSlug());
    }

    public function testSetSlug(): void
    {
        $expected = "seem";
        $model = $this->model;
        $model->setSlug($expected);

        $this->assertEquals($expected, $model->getSlug());
    }

    public function testGetContent(): void
    {
        $this->assertEquals($this->dto->content, $this->model->getContent());
    }

    public function testSetContent(): void
    {
        $expected = "Government lawyer health organization poor purpose leg. Bank consumer task address least effort. Education player plan movement.";
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