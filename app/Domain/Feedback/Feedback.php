<?php

namespace App\Domain\Feedback;

use App\Exceptions\PhoneValidationException;
use App\Infrastructure\DatabaseConnect;

class Feedback
{
    private $name;
    private $phone;
    private $message;

    public function __construct(string $name, string $phone, string $message)
    {
        $this->name = $name;
        $this->phone = $this->validatePhone($phone);
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

    private function validatePhone($phone)
    {
        if (!preg_match('/^\d+$/', $phone)) {
            throw new PhoneValidationException($phone);
        }

        return $phone;
    }

    public function save(): bool
    {
        $database = new DatabaseConnect();
        return $database->saveFeedback($this);
    }
}
