<?php

namespace App\Services;

use stdClass;

class UserService
{
    protected $repository;

    public function __contruct() {
        
    }

    public function getAll(array $conditions = null) : array {
        return $this->repository->getAll($conditions);
    }

    public function findOne(string|int $id) : stdClass|null {
        return $this->repository->findOne($id);
    }

    public function new(
        string|int $stateId,
        string|int $cityId,
        string $name,
        string $email,
        string $password,
        string $gender,
        string $cpf,
        string $birth,
        string $addres,
    ) : stdClass {
        return $this->repository->new(
            $stateId,
            $cityId,
            $name,
            $email,
            $password,
            $gender,
            $cpf,
            $birth,
            $addres,
        );
    }

    public function delete(string|int $id) : void {
        $this->repository->delete($id);
    }
}
