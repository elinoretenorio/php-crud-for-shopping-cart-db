<?php

declare(strict_types=1);

namespace ShoppingCart\Tests\Transaction;

use PHPUnit\Framework\TestCase;
use ShoppingCart\Transaction\{ TransactionDto, TransactionModel };

class TransactionModelTest extends TestCase
{
    private array $input;
    private TransactionDto $dto;
    private TransactionModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 6799,
            "user_id" => 4042,
            "order_id" => 5762,
            "code" => "human",
            "type" => 6544,
            "mode" => 543,
            "status" => 4343,
            "created_at" => "2021-09-29 00:53:44",
            "updated_at" => "2021-10-06 04:27:55",
            "content" => "Sure national Republican. Culture region action garden.",
        ];
        $this->dto = new TransactionDto($this->input);
        $this->model = new TransactionModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new TransactionModel(null);

        $this->assertInstanceOf(TransactionModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 1647;
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
        $expected = 9484;
        $model = $this->model;
        $model->setUserId($expected);

        $this->assertEquals($expected, $model->getUserId());
    }

    public function testGetOrderId(): void
    {
        $this->assertEquals($this->dto->orderId, $this->model->getOrderId());
    }

    public function testSetOrderId(): void
    {
        $expected = 9830;
        $model = $this->model;
        $model->setOrderId($expected);

        $this->assertEquals($expected, $model->getOrderId());
    }

    public function testGetCode(): void
    {
        $this->assertEquals($this->dto->code, $this->model->getCode());
    }

    public function testSetCode(): void
    {
        $expected = "service";
        $model = $this->model;
        $model->setCode($expected);

        $this->assertEquals($expected, $model->getCode());
    }

    public function testGetType(): void
    {
        $this->assertEquals($this->dto->type, $this->model->getType());
    }

    public function testSetType(): void
    {
        $expected = 5243;
        $model = $this->model;
        $model->setType($expected);

        $this->assertEquals($expected, $model->getType());
    }

    public function testGetMode(): void
    {
        $this->assertEquals($this->dto->mode, $this->model->getMode());
    }

    public function testSetMode(): void
    {
        $expected = 4732;
        $model = $this->model;
        $model->setMode($expected);

        $this->assertEquals($expected, $model->getMode());
    }

    public function testGetStatus(): void
    {
        $this->assertEquals($this->dto->status, $this->model->getStatus());
    }

    public function testSetStatus(): void
    {
        $expected = 8830;
        $model = $this->model;
        $model->setStatus($expected);

        $this->assertEquals($expected, $model->getStatus());
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals($this->dto->createdAt, $this->model->getCreatedAt());
    }

    public function testSetCreatedAt(): void
    {
        $expected = "2021-09-20 19:40:51";
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
        $expected = "2021-10-16 02:20:28";
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
        $expected = "Letter I activity executive beat may. Family ten author meeting notice.";
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