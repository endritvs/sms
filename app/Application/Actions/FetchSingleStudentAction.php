<?php

namespace App\Application\Actions;

use App\Domain\Repositories\StudentRepositoryInterface;

class FetchSingleStudentAction
{
    private $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function execute(int $id)
    {
        return $this->studentRepository->findById($id);
    }
}
