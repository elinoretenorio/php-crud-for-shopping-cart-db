<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\Order;

use PHPUnit\Framework\TestCase;
use ShoppingCart\Order\{ OrderDto, OrderModel, IOrderService, OrderService };

class OrderServiceTest extends TestCase
{
    private $repository;
    private array $input;
    private OrderDto $dto;
    private OrderModel $model;
    private IOrderService $service;

    protected function setUp(): void
    {
        $this->repository = $this->createMock("ShoppingCart\Order\IOrderRepository");
        $this->input = [
            "id" => 8462,
            "user_id" => 8763,
            "session_id" => "pull",
            "token" => "public",
            "status" => 4337,
            "sub_total" => 667.40,
            "item_discount" => 101.92,
            "tax" => 995.00,
            "shipping" => 185.00,
            "total" => 51.00,
            "promo" => "personal",
            "discount" => 635.33,
            "grand_total" => 887.66,
            "first_name" => "child",
            "middle_name" => "production",
            "last_name" => "pattern",
            "mobile" => "inside",
            "email" => "jessicacain@example.com",
            "line1" => "nothing",
            "line2" => "most",
            "city" => "off",
            "province" => "your",
            "country" => "tree",
            "created_at" => "2021-09-20 14:29:43",
            "updated_at" => "2021-09-25 17:50:53",
            "content" => "Little spring determine choose reach about. Central whether maybe reflect although onto. Region huge physical dinner.",
        ];
        $this->dto = new OrderDto($this->input);
        $this->model = new OrderModel($this->dto);
        $this->service = new OrderService($this->repository);
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
        $expected = 6669;

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
        $expected = 3637;

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
        $id = 9807;

        $this->repository->expects($this->once())
            ->method("get")
            ->with($id)
            ->willReturn(null);

        $actual = $this->service->get($id);
        $this->assertNull($actual);
    }

    public function testGet_ReturnsModel(): void
    {
        $id = 2219;

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
        $id = 9917;
        $expected = 2763;

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