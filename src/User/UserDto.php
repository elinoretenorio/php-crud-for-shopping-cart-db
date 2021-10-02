<?php

declare(strict_types=1);

namespace ShoppingCart\User;

class UserDto 
{
    public int $id;
    public string $firstName;
    public string $middleName;
    public string $lastName;
    public string $mobile;
    public string $email;
    public string $passwordHash;
    public int $admin;
    public int $vendor;
    public string $registeredAt;
    public string $lastLogin;
    public string $intro;
    public string $profile;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->firstName = $row["first_name"] ?? "";
        $this->middleName = $row["middle_name"] ?? "";
        $this->lastName = $row["last_name"] ?? "";
        $this->mobile = $row["mobile"] ?? "";
        $this->email = $row["email"] ?? "";
        $this->passwordHash = $row["password_hash"] ?? "";
        $this->admin = (int) ($row["admin"] ?? 0);
        $this->vendor = (int) ($row["vendor"] ?? 0);
        $this->registeredAt = $row["registered_at"] ?? "";
        $this->lastLogin = $row["last_login"] ?? "";
        $this->intro = $row["intro"] ?? "";
        $this->profile = $row["profile"] ?? "";
    }
}