<?php

declare(strict_types=1);

namespace ShoppingCart\User;

interface IUserService
{
    public function insert(UserModel $model): int;

    public function update(UserModel $model): int;

    public function get(int $id): ?UserModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?UserModel;
}