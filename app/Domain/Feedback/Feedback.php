<?php

namespace App\Domain\Feedback;

use App\Domain\Database;

class Feedback
{
    protected string $name;
    protected string $phone;
    protected string $message;

    public function __construct(string $name, string $phone, string $message)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->message = $message;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function save(): bool
    {
        $database = new Database(); 
        return $database->saveFeedback($this); 
    }
}