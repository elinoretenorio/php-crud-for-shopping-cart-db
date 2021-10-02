<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\Order;

use PHPUnit\Framework\TestCase;
use ShoppingCart\Order\{ OrderDto, OrderModel, OrderController };

class OrderControllerTest extends TestCase
{
    private array $input;
    private OrderDto $dto;
    private OrderModel $model;
    private $service;
    private $request;
    private $stream;
    private OrderController $controller;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 6953,
            "user_id" => 3692,
            "session_id" => "president",
            "token" => "part",
            "status" => 5654,
            "sub_total" => 987.32,
            "item_discount" => 487.93,
            "tax" => 583.68,
            "shipping" => 87.12,
            "total" => 620.28,
            "promo" => "all",
            "discount" => 885.28,
            "grand_total" => 958.00,
            "first_name" => "total",
            "middle_name" => "account",
            "last_name" => "individual",
            "mobile" => "east",
            "email" => "garciadebra@example.org",
            "line1" => "decision",
            "line2" => "more",
            "city" => "soon",
            "province" => "outside",
            "country" => "meeting",
            "created_at" => "2021-09-30 15:56:57",
            "updated_at" => "2021-09-28 06:15:55",
            "content" => "Reduce turn expert agent opportunity. Upon place spring well. Guess it put degree senior.",
        ];
        $this->dto = new OrderDto($this->input);
        $this->model = new OrderModel($this->dto);
        $this->service = $this->createMock("ShoppingCart\Order\IOrderService");
        $this->request = $this->createMock("Psr\Http\Message\ServerRequestInterface");
        $this->stream = $this->createMock("Psr\Http\Message\StreamInterface");
        $this->controller = new OrderController(
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
        $id = 1243;
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
        $id = 1632;
        $expected = ["result" => $id];
        $args = ["id" => 7102];

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
        $args = ["id" => 601];

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
        $id = 5316;
        $expected = ["result" => $id];
        $args = ["id" => 3949];

        $this->service->expects($this->once())
            ->method("delete")
            ->with($args["id"])
            ->willReturn($id);

        $actual = $this->controller->delete($this->request, $args);
        $this->assertEquals($expected, $actual->getPayload());
    }
}