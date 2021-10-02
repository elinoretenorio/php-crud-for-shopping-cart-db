<?php

declare(strict_types=1);

namespace ShoppingCart\User;

interface IUserRepository
{
    public function insert(UserDto $dto): int;

    public function update(UserDto $dto): int;

    public function get(int $id): ?UserDto;

    public function getAll(): array;

    public function delete(int $id): int;
}