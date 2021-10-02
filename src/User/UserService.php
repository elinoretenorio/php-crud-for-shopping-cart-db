<?php

declare(strict_types=1);

namespace ShoppingCart\User;

class UserService implements IUserService
{
    private IUserRepository $repository;

    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(UserModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(UserModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?UserModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new UserModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var UserDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new UserModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?UserModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new UserDto($row);

        return new UserModel($dto);
    }
}