<?php

declare(strict_types=1);

namespace ShoppingCart\Order;

class OrderDto 
{
    public int $id;
    public int $userId;
    public string $sessionId;
    public string $token;
    public int $status;
    public float $subTotal;
    public float $itemDiscount;
    public float $tax;
    public float $shipping;
    public float $total;
    public string $promo;
    public float $discount;
    public float $grandTotal;
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
        $this->subTotal = (float) ($row["sub_total"] ?? 0);
        $this->itemDiscount = (float) ($row["item_discount"] ?? 0);
        $this->tax = (float) ($row["tax"] ?? 0);
        $this->shipping = (float) ($row["shipping"] ?? 0);
        $this->total = (float) ($row["total"] ?? 0);
        $this->promo = $row["promo"] ?? "";
        $this->discount = (float) ($row["discount"] ?? 0);
        $this->grandTotal = (float) ($row["grand_total"] ?? 0);
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