<?php

declare(strict_types=1);

namespace ShoppingCart\Cart;

class CartDto 
{
    public int $id;
    public int $userId;
    public string $sessionId;
    public string $token;
    public int $status;
    public string $firstName;
    public string $middleName;
    public string $lastName;
    public string $mobile;
    public string $email;
    public string $line1;
    public string $line2;
    public string $city;
    public string $province;
    public string $country;
    public string $createdAt;
    public string $updatedAt;
    public string $content;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->userId = (int) ($row["user_id"] ?? 0);
        $this->sessionId = $row["session_id"] ?? "";
        $this->token = $row["token"] ?? "";
        $this->status = (int) ($row["status"] ?? 0);
        $this->firstName = $row["first_name"] ?? "";
        $this->middleName = $row["middle_name"] ?? "";
        $this->lastName = $row["last_name"] ?? "";
        $this->mobile = $row["mobile"] ?? "";
        $this->email = $row["email"] ?? "";
        $this->line1 = $row["line1"] ?? "";
        $this->line2 = $row["line2"] ?? "";
        $this->city = $row["city"] ?? "";
        $this->province = $row["province"] ?? "";
        $this->country = $row["country"] ?? "";
        $this->createdAt = $row["created_at"] ?? "";
        $this->updatedAt = $row["updated_at"] ?? "";
        $this->content = $row["content"] ?? "";
    }
}