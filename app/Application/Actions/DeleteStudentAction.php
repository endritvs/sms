<?php

namespace App\Application\Actions;

use App\Domain\Repositories\StudentRepositoryInterface;

class DeleteStudentAction
{
    private $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function execute(int $id): void
    {
        $this->studentRepository->delete($id);
    }
}
