<?php

declare(strict_types=1);

namespace ShoppingCart\User;

use ShoppingCart\Database\IDatabase;
use ShoppingCart\Database\DatabaseException;

class UserRepository implements IUserRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(UserDto $dto): int
    {
        $sql = "INSERT INTO `user` (`first_name`, `middle_name`, `last_name`, `mobile`, `email`, `password_hash`, `admin`, `vendor`, `registered_at`, `last_login`, `intro`, `profile`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->firstName,
                $dto->middleName,
                $dto->lastName,
                $dto->mobile,
                $dto->email,
                $dto->passwordHash,
                $dto->admin,
                $dto->vendor,
                $dto->registeredAt,
                $dto->lastLogin,
                $dto->intro,
                $dto->profile
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(UserDto $dto): int
    {
        $sql = "UPDATE `user` SET `first_name` = ?, `middle_name` = ?, `last_name` = ?, `mobile` = ?, `email` = ?, `password_hash` = ?, `admin` = ?, `vendor` = ?, `registered_at` = ?, `last_login` = ?, `intro` = ?, `profile` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->firstName,
                $dto->middleName,
                $dto->lastName,
                $dto->mobile,
                $dto->email,
                $dto->passwordHash,
                $dto->admin,
                $dto->vendor,
                $dto->registeredAt,
                $dto->lastLogin,
                $dto->intro,
                $dto->profile,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?UserDto
    {
        $sql = "SELECT `id`, `first_name`, `middle_name`, `last_name`, `mobile`, `email`, `password_hash`, `admin`, `vendor`, `registered_at`, `last_login`, `intro`, `profile`
                FROM `user` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new UserDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `first_name`, `middle_name`, `last_name`, `mobile`, `email`, `password_hash`, `admin`, `vendor`, `registered_at`, `last_login`, `intro`, `profile`
                FROM `user`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new UserDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `user` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}