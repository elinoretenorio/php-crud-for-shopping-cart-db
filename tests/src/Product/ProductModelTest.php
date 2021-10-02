<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\Product;

use PHPUnit\Framework\TestCase;
use ShoppingCart\Product\{ ProductDto, ProductModel };

class ProductModelTest extends TestCase
{
    private array $input;
    private ProductDto $dto;
    private ProductModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 5290,
            "user_id" => 3835,
            "title" => "news",
            "meta_title" => "people",
            "slug" => "western",
            "summary" => "Everything same whose open recently.",
            "type" => 4873,
            "sku" => "player",
            "price" => 474.10,
            "discount" => 31.00,
            "quantity" => 6249,
            "shop" => 3605,
            "created_at" => "2021-09-21 12:24:26",
            "updated_at" => "2021-10-17 14:53:47",
            "published_at" => "2021-10-15 19:00:19",
            "starts_at" => "2021-09-29 06:10:32",
            "ends_at" => "2021-09-30 17:57:31",
            "content" => "Property much road owner I effect. Around attention need various structure lose month. Guess seven surface occur Republican tough or.",
        ];
        $this->dto = new ProductDto($this->input);
        $this->model = new ProductModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new ProductModel(null);

        $this->assertInstanceOf(ProductModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 2048;
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
        $expected = 7410;
        $model = $this->model;
        $model->setUserId($expected);

        $this->assertEquals($expected, $model->getUserId());
    }

    public function testGetTitle(): void
    {
        $this->assertEquals($this->dto->title, $this->model->getTitle());
    }

    public function testSetTitle(): void
    {
        $expected = "wide";
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
        $expected = "high";
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
        $expected = "between";
        $model = $this->model;
        $model->setSlug($expected);

        $this->assertEquals($expected, $model->getSlug());
    }

    public function testGetSummary(): void
    {
        $this->assertEquals($this->dto->summary, $this->model->getSummary());
    }

    public function testSetSummary(): void
    {
        $expected = "Impact truth travel Congress white show central summer.";
        $model = $this->model;
        $model->setSummary($expected);

        $this->assertEquals($expected, $model->getSummary());
    }

    public function testGetType(): void
    {
        $this->assertEquals($this->dto->type, $this->model->getType());
    }

    public function testSetType(): void
    {
        $expected = 9900;
        $model = $this->model;
        $model->setType($expected);

        $this->assertEquals($expected, $model->getType());
    }

    public function testGetSku(): void
    {
        $this->assertEquals($this->dto->sku, $this->model->getSku());
    }

    public function testSetSku(): void
    {
        $expected = "community";
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
        $expected = 256.45;
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
        $expected = 706.67;
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
        $expected = 9918;
        $model = $this->model;
        $model->setQuantity($expected);

        $this->assertEquals($expected, $model->getQuantity());
    }

    public function testGetShop(): void
    {
        $this->assertEquals($this->dto->shop, $this->model->getShop());
    }

    public function testSetShop(): void
    {
        $expected = 4249;
        $model = $this->model;
        $model->setShop($expected);

        $this->assertEquals($expected, $model->getShop());
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals($this->dto->createdAt, $this->model->getCreatedAt());
    }

    public function testSetCreatedAt(): void
    {
        $expected = "2021-10-14 07:29:46";
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
        $expected = "2021-09-20 04:13:43";
        $model = $this->model;
        $model->setUpdatedAt($expected);

        $this->assertEquals($expected, $model->getUpdatedAt());
    }

    public function testGetPublishedAt(): void
    {
        $this->assertEquals($this->dto->publishedAt, $this->model->getPublishedAt());
    }

    public function testSetPublishedAt(): void
    {
        $expected = "2021-10-09 05:30:30";
        $model = $this->model;
        $model->setPublishedAt($expected);

        $this->assertEquals($expected, $model->getPublishedAt());
    }

    public function testGetStartsAt(): void
    {
        $this->assertEquals($this->dto->startsAt, $this->model->getStartsAt());
    }

    public function testSetStartsAt(): void
    {
        $expected = "2021-09-29 02:03:34";
        $model = $this->model;
        $model->setStartsAt($expected);

        $this->assertEquals($expected, $model->getStartsAt());
    }

    public function testGetEndsAt(): void
    {
        $this->assertEquals($this->dto->endsAt, $this->model->getEndsAt());
    }

    public function testSetEndsAt(): void
    {
        $expected = "2021-09-30 05:10:05";
        $model = $this->model;
        $model->setEndsAt($expected);

        $this->assertEquals($expected, $model->getEndsAt());
    }

    public function testGetContent(): void
    {
        $this->assertEquals($this->dto->content, $this->model->getContent());
    }

    public function testSetContent(): void
    {
        $expected = "Member check board herself prepare share. Because end discussion strong must. When walk effort.";
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