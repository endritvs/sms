<?php

namespace App\Application\Actions;

use App\Domain\Entities\Student;
use App\Domain\Repositories\StudentRepositoryInterface;

class CreateStudentAction
{
    private $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function execute($data): Student
    {
        $student = new Student(
            id: null,
            username: $data['username'],
            email: $data['email']
        );

        return $this->studentRepository->save($student);
    }
}
