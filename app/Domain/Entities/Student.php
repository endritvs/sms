<?php

namespace App\Domain\Entities;

class Student
{
    public function __construct(
        public readonly ?int $id, 
        public string $username, 
        public string $email
    ){}

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }
}
