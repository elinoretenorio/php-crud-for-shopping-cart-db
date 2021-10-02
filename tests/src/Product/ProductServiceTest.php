<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\Product;

use PHPUnit\Framework\TestCase;
use ShoppingCart\Product\{ ProductDto, ProductModel, IProductService, ProductService };

class ProductServiceTest extends TestCase
{
    private $repository;
    private array $input;
    private ProductDto $dto;
    private ProductModel $model;
    private IProductService $service;

    protected function setUp(): void
    {
        $this->repository = $this->createMock("ShoppingCart\Product\IProductRepository");
        $this->input = [
            "id" => 3077,
            "user_id" => 2143,
            "title" => "reach",
            "meta_title" => "authority",
            "slug" => "picture",
            "summary" => "Effect development probably number.",
            "type" => 6685,
            "sku" => "rather",
            "price" => 244.42,
            "discount" => 751.84,
            "quantity" => 4578,
            "shop" => 1081,
            "created_at" => "2021-10-14 06:02:55",
            "updated_at" => "2021-10-05 19:25:55",
            "published_at" => "2021-10-04 16:04:53",
            "starts_at" => "2021-10-10 22:15:20",
            "ends_at" => "2021-10-07 16:30:18",
            "content" => "Staff side consumer whom now environmental time. Near skill ago age can certainly among.",
        ];
        $this->dto = new ProductDto($this->input);
        $this->model = new ProductModel($this->dto);
        $this->service = new ProductService($this->repository);
    }

    protected function tearDown(): void
    {
        unset($this->repository);
        unset($this->input);
        unset($this->dto);
        unset($this->model);
        unset($this->service);
    }

    public function testInsert_ReturnsId(): void
    {
        $expected = 6770;

        $this->repository->expects($this->once())
            ->method("insert")
            ->with($this->dto)
            ->willReturn($expected);

        $actual = $this->service->insert($this->model);
        $this->assertEquals($expected, $actual);
    }

    public function testInsert_ReturnsEmpty(): void
    {
        $expected = 0;

        $this->repository->expects($this->once())
            ->method("insert")
            ->with($this->dto)
            ->willReturn($expected);

        $actual = $this->service->insert($this->model);
        $this->assertEmpty($actual);
    }

    public function testUpdate_ReturnsRowCount(): void
    {
        $expected = 7792;

        $this->repository->expects($this->once())
            ->method("update")
            ->with($this->dto)
            ->willReturn($expected);

        $actual = $this->service->update($this->model);
        $this->assertEquals($expected, $actual);
    }

    public function testUpdate_ReturnsEmpty(): void
    {
        $expected = 0;

        $this->repository->expects($this->once())
            ->method("update")
            ->with($this->dto)
            ->willReturn($expected);

        $actual = $this->service->update($this->model);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsNull(): void
    {
        $id = 7948;

        $this->repository->expects($this->once())
            ->method("get")
            ->with($id)
            ->willReturn(null);

        $actual = $this->service->get($id);
        $this->assertNull($actual);
    }

    public function testGet_ReturnsModel(): void
    {
        $id = 2453;

        $this->repository->expects($this->once())
            ->method("get")
            ->with($id)
            ->willReturn($this->dto);

        $actual = $this->service->get($id);
        $this->assertEquals($this->model, $actual);
    }

    public function testGetAll_ReturnsEmpty(): void
    {
        $this->repository->expects($this->once())
            ->method("getAll")
            ->willReturn([]);

        $actual = $this->service->getAll();
        $this->assertEmpty($actual);
    }

    public function testGetAll_ReturnsModels(): void
    {
        $this->repository->expects($this->once())
            ->method("getAll")
            ->willReturn([$this->dto]);

        $actual = $this->service->getAll();
        $this->assertEquals([$this->model], $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 7027;
        $expected = 5646;

        $this->repository->expects($this->once())
            ->method("delete")
            ->with($id)
            ->willReturn($expected);

        $actual = $this->service->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testCreateModel_ReturnsNullIfEmpty(): void
    {
        $actual = $this->service->createModel([]);
        $this->assertNull($actual);
    }

    public function testCreateModel_ReturnsModel(): void
    {
        $actual = $this->service->createModel($this->input);
        $this->assertEquals($this->model, $actual);
    }
}