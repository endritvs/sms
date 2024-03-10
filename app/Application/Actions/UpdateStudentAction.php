<?php

namespace App\Application\Actions;

use App\Domain\Entities\Student;
use App\Domain\Repositories\StudentRepositoryInterface;

class UpdateStudentAction
{
    private $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function execute(int $id, array $data): Student
    {
        $student = $this->studentRepository->findById($id);

        if (!$student) {
            throw new \Exception("Student not found", 404);
        }

        $student->setUsername($data['username']);
        $student->setEmail($data['email']);

        return $this->studentRepository->save($student);
    }
}