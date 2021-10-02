<?php

declare(strict_types=1);

namespace ShoppingCart\Cart;

use JsonSerializable;

class CartModel implements JsonSerializable
{
    private int $id;
    private int $userId;
    private string $sessionId;
    private string $token;
    private int $status;
    private string $firstName;
    private string $middleName;
    private string $lastName;
    private string $mobile;
    private string $email;
    private string $line1;
    private string $line2;
    private string $city;
    private string $province;
    private string $country;
    private string $createdAt;
    private string $updatedAt;
    private string $content;

    public function __construct(CartDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->userId = $dto->userId;
        $this->sessionId = $dto->sessionId;
        $this->token = $dto->token;
        $this->status = $dto->status;
        $this->firstName = $dto->firstName;
        $this->middleName = $dto->middleName;
        $this->lastName = $dto->lastName;
        $this->mobile = $dto->mobile;
        $this->email = $dto->email;
        $this->line1 = $dto->line1;
        $this->line2 = $dto->line2;
        $this->city = $dto->city;
        $this->province = $dto->province;
        $this->country = $dto->country;
        $this->createdAt = $dto->createdAt;
        $this->updatedAt = $dto->updatedAt;
        $this->content = $dto->content;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function setSessionId(string $sessionId): void
    {
        $this->sessionId = $sessionId;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getMiddleName(): string
    {
        return $this->middleName;
    }

    public function setMiddleName(string $middleName): void
    {
        $this->middleName = $middleName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getMobile(): string
    {
        return $this->mobile;
    }

    public function setMobile(string $mobile): void
    {
        $this->mobile = $mobile;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getLine1(): string
    {
        return $this->line1;
    }

    public function setLine1(string $line1): void
    {
        $this->line1 = $line1;
    }

    public function getLine2(): string
    {
        return $this->line2;
    }

    public function setLine2(string $line2): void
    {
        $this->line2 = $line2;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getProvince(): string
    {
        return $this->province;
    }

    public function setProvince(string $province): void
    {
        $this->province = $province;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function toDto(): CartDto
    {
        $dto = new CartDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->userId = (int) ($this->userId ?? 0);
        $dto->sessionId = $this->sessionId ?? "";
        $dto->token = $this->token ?? "";
        $dto->status = (int) ($this->status ?? 0);
        $dto->firstName = $this->firstName ?? "";
        $dto->middleName = $this->middleName ?? "";
        $dto->lastName = $this->lastName ?? "";
        $dto->mobile = $this->mobile ?? "";
        $dto->email = $this->email ?? "";
        $dto->line1 = $this->line1 ?? "";
        $dto->line2 = $this->line2 ?? "";
        $dto->city = $this->city ?? "";
        $dto->province = $this->province ?? "";
        $dto->country = $this->country ?? "";
        $dto->createdAt = $this->createdAt ?? "";
        $dto->updatedAt = $this->updatedAt ?? "";
        $dto->content = $this->content ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "user_id" => $this->userId,
            "session_id" => $this->sessionId,
            "token" => $this->token,
            "status" => $this->status,
            "first_name" => $this->firstName,
            "middle_name" => $this->middleName,
            "last_name" => $this->lastName,
            "mobile" => $this->mobile,
            "email" => $this->email,
            "line1" => $this->line1,
            "line2" => $this->line2,
            "city" => $this->city,
            "province" => $this->province,
            "country" => $this->country,
            "created_at" => $this->createdAt,
            "updated_at" => $this->updatedAt,
            "content" => $this->content,
        ];
    }
}