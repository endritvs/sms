<?php

namespace App\Domain\Entities;

class Student
{
    public function __construct(
        public readonly ?int $id, 
        public readonly string $username, 
        public readonly string $email
    ){

    }
}
