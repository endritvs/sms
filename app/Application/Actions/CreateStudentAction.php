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
        $student = new Student();
        $student->setUsername($data['username']);
        $student->setEmail($data['email']);

        return $this->studentRepository->save($student);
    }
}
