<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Student;

interface StudentRepositoryInterface
{
    public function findAll(): array;
    public function findById(int $id): ?Student;
    public function save(Student $student): Student;
    public function delete(int $id): void;
}
