<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\Product;

use PHPUnit\Framework\TestCase;
use ShoppingCart\Product\{ ProductDto, ProductModel, ProductController };

class ProductControllerTest extends TestCase
{
    private array $input;
    private ProductDto $dto;
    private ProductModel $model;
    private $service;
    private $request;
    private $stream;
    private ProductController $controller;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 2877,
            "user_id" => 6620,
            "title" => "follow",
            "meta_title" => "four",
            "slug" => "meeting",
            "summary" => "Commercial four scientist oil.",
            "type" => 7864,
            "sku" => "fight",
            "price" => 131.00,
            "discount" => 983.96,
            "quantity" => 5081,
            "shop" => 575,
            "created_at" => "2021-10-08 12:47:32",
            "updated_at" => "2021-10-09 17:13:08",
            "published_at" => "2021-10-04 21:51:36",
            "starts_at" => "2021-10-01 13:39:19",
            "ends_at" => "2021-09-20 11:34:24",
            "content" => "Growth industry discuss piece these. Catch however offer new for most bring.",
        ];
        $this->dto = new ProductDto($this->input);
        $this->model = new ProductModel($this->dto);
        $this->service = $this->createMock("ShoppingCart\Product\IProductService");
        $this->request = $this->createMock("Psr\Http\Message\ServerRequestInterface");
        $this->stream = $this->createMock("Psr\Http\Message\StreamInterface");
        $this->controller = new ProductController(
            $this->service
        );

        $this->stream->method("getContents")
            ->willReturn("[]");

        $this->request->method("getBody")
            ->willReturn($this->stream);

        $this->request->method("getParsedBody")
            ->willReturn($this->input);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
        unset($this->service);
        unset($this->request);
        unset($this->stream);
        unset($this->controller);
    }

    public function testInsert_ReturnsResponse(): void
    {
        $id = 8495;
        $expected = ["result" => $id];
        $args = [];

        $this->service->expects($this->once())
            ->method("createModel")
            ->with($this->request->getParsedBody())
            ->willReturn($this->model);
        $this->service->expects($this->once())
            ->method("insert")
            ->with($this->model)
            ->willReturn($id);

        $actual = $this->controller->insert($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }

    public function testUpdate_ReturnsErrorResponse(): void
    {
        $expected = ["result" => 0, "message" => "Invalid input"];
        $args = ["id" => 0];

        $actual = $this->controller->update($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }

    public function testUpdate_ReturnsResponse(): void
    {
        $id = 2418;
        $expected = ["result" => $id];
        $args = ["id" => 8955];

        $this->service->expects($this->once())
            ->method("createModel")
            ->with($this->request->getParsedBody())
            ->willReturn($this->model);
        $this->service->expects($this->once())
            ->method("update")
            ->with($this->model)
            ->willReturn($id);

        $actual = $this->controller->update($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }

    public function testGet_ReturnsErrorResponse(): void
    {
        $expected = ["result" => 0, "message" => "Invalid input"];
        $args = ["id" => 0];

        $actual = $this->controller->get($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }

    public function testGet_ReturnsResponse(): void
    {
        $expected = ["result" => $this->model->jsonSerialize()];
        $args = ["id" => 7531];

        $this->service->expects($this->once())
            ->method("get")
            ->with($args["id"])
            ->willReturn($this->model);

        $actual = $this->controller->get($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }

    public function testGetAll_ReturnsResponse(): void
    {
        $expected = ["result" => [$this->model->jsonSerialize()]];
        $args = [];

        $this->service->expects($this->once())
            ->method("getAll")
            ->willReturn([$this->model]);

        $actual = $this->controller->getAll($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }

    public function testDelete_ReturnsErrorResponse(): void
    {
        $expected = ["result" => 0, "message" => "Invalid input"];
        $args = ["id" => 0];

        $actual = $this->controller->delete($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }

    public function testDelete_ReturnsResponse(): void
    {
        $id = 3520;
        $expected = ["result" => $id];
        $args = ["id" => 9784];

        $this->service->expects($this->once())
            ->method("delete")
            ->with($args["id"])
            ->willReturn($id);

        $actual = $this->controller->delete($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }
}