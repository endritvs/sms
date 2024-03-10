<?php

namespace App\Application\DTOs;

class StudentData
{
    public $username;
    public $email;

    public function __construct(string $username, string $email)
    {
        $this->username = $username;
        $this->email = $email;
    }
}
