<?php

declare(strict_types=1);

namespace ShoppingCart\User;

use JsonSerializable;

class UserModel implements JsonSerializable
{
    private int $id;
    private string $firstName;
    private string $middleName;
    private string $lastName;
    private string $mobile;
    private string $email;
    private string $passwordHash;
    private int $admin;
    private int $vendor;
    private string $registeredAt;
    private string $lastLogin;
    private string $intro;
    private string $profile;

    public function __construct(UserDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->firstName = $dto->firstName;
        $this->middleName = $dto->middleName;
        $this->lastName = $dto->lastName;
        $this->mobile = $dto->mobile;
        $this->email = $dto->email;
        $this->passwordHash = $dto->passwordHash;
        $this->admin = $dto->admin;
        $this->vendor = $dto->vendor;
        $this->registeredAt = $dto->registeredAt;
        $this->lastLogin = $dto->lastLogin;
        $this->intro = $dto->intro;
        $this->profile = $dto->profile;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
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

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    public function setPasswordHash(string $passwordHash): void
    {
        $this->passwordHash = $passwordHash;
    }

    public function getAdmin(): int
    {
        return $this->admin;
    }

    public function setAdmin(int $admin): void
    {
        $this->admin = $admin;
    }

    public function getVendor(): int
    {
        return $this->vendor;
    }

    public function setVendor(int $vendor): void
    {
        $this->vendor = $vendor;
    }

    public function getRegisteredAt(): string
    {
        return $this->registeredAt;
    }

    public function setRegisteredAt(string $registeredAt): void
    {
        $this->registeredAt = $registeredAt;
    }

    public function getLastLogin(): string
    {
        return $this->lastLogin;
    }

    public function setLastLogin(string $lastLogin): void
    {
        $this->lastLogin = $lastLogin;
    }

    public function getIntro(): string
    {
        return $this->intro;
    }

    public function setIntro(string $intro): void
    {
        $this->intro = $intro;
    }

    public function getProfile(): string
    {
        return $this->profile;
    }

    public function setProfile(string $profile): void
    {
        $this->profile = $profile;
    }

    public function toDto(): UserDto
    {
        $dto = new UserDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->firstName = $this->firstName ?? "";
        $dto->middleName = $this->middleName ?? "";
        $dto->lastName = $this->lastName ?? "";
        $dto->mobile = $this->mobile ?? "";
        $dto->email = $this->email ?? "";
        $dto->passwordHash = $this->passwordHash ?? "";
        $dto->admin = (int) ($this->admin ?? 0);
        $dto->vendor = (int) ($this->vendor ?? 0);
        $dto->registeredAt = $this->registeredAt ?? "";
        $dto->lastLogin = $this->lastLogin ?? "";
        $dto->intro = $this->intro ?? "";
        $dto->profile = $this->profile ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "first_name" => $this->firstName,
            "middle_name" => $this->middleName,
            "last_name" => $this->lastName,
            "mobile" => $this->mobile,
            "email" => $this->email,
            "password_hash" => $this->passwordHash,
            "admin" => $this->admin,
            "vendor" => $this->vendor,
            "registered_at" => $this->registeredAt,
            "last_login" => $this->lastLogin,
            "intro" => $this->intro,
            "profile" => $this->profile,
        ];
    }
}