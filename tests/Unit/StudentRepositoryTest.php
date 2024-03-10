<?php

use PHPUnit\Framework\TestCase;
use App\Domain\Repositories\StudentRepositoryInterface;
use App\Domain\Entities\Student;

class StudentRepositoryTest extends TestCase
{
    private $studentRepository;

    protected function setUp(): void
    {
        $this->studentRepository = $this->createMock(StudentRepositoryInterface::class);
    }

    public function testFindAll()
    {
        $students = [
            new Student(1, 'user1', 'user1@example.com'),
            new Student(2, 'user2', 'user2@example.com'),
        ];

        $this->studentRepository->method('findAll')->willReturn($students);

        $this->assertEquals($students, $this->studentRepository->findAll());
    }

    public function testFindById()
    {
        $student = new Student(1, 'user1', 'user1@example.com');

        $this->studentRepository->method('findById')->willReturn($student);

        $this->assertEquals($student, $this->studentRepository->findById(1));
    }

    public function testSave()
    {
        $student = new Student(null, 'newuser', 'newuser@example.com');

        $savedStudent = new Student(1, 'newuser', 'newuser@example.com');

        $this->studentRepository->method('save')->willReturn($savedStudent);

        $this->assertEquals($savedStudent, $this->studentRepository->save($student));
    }

    public function testDelete()
    {
        $this->studentRepository->expects($this->once())->method('delete')->with($this->equalTo(1));

        $this->studentRepository->delete(1);
    }
}
