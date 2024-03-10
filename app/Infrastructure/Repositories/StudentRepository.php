<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Entities\Student as DomainStudent;
use App\Domain\Repositories\StudentRepositoryInterface;
use App\Models\Student;

class StudentRepository implements StudentRepositoryInterface
{
    public function findAll(): array
    {
        return Student::all()->map(function ($model) {
            return new DomainStudent($model->id, $model->username, $model->email);
        })->toArray();
    }

    public function findById(int $id): ?DomainStudent
    {
        $model = Student::find($id);
        if (!$model) return null;
        return new DomainStudent($model->id, $model->username, $model->email);
    }

    public function save(DomainStudent $student): DomainStudent
    {
        if ($student->id) {
            $model = Student::find($student->id);
            $model->update([
                'username' => $student->username,
                'email' => $student->email,
            ]);
        } else {
            $model = new Student([
                'username' => $student->username,
                'email' => $student->email,
            ]);
            $model->save();
        }
        
        return new DomainStudent($model->id, $model->username, $model->email);
    }

    public function delete(int $id): void
    {
        Student::destroy($id);
    }
}
