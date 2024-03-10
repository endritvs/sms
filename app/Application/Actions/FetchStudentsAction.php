<?php

namespace App\Application\Actions;

use App\Domain\Repositories\StudentRepositoryInterface;

class FetchStudentsAction
{
    private $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function execute()
    {
        return $this->studentRepository->findAll();
    }
}
