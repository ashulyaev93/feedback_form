<?php

namespace App\Infrastructure;

use Illuminate\Http\Request;

class FeedbackDto
{
    public string $name;
    public string $phone;
    public string $message;

    public static function fromRequest(Request $request): self
    {
        $dto = new self();
        $dto->name = $request->input('name');
        $dto->phone = $request->input('phone');
        $dto->message = $request->input('message');

        return $dto;
    }
}
