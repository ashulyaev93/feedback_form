<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Feedback\Feedback;

class FileFeedbackRepository implements FeedbackRepositoryInterface
{
    protected string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function save(Feedback $feedback): void
    {
        $data = json_encode([
            'name' => $feedback->getName(),
            'phone' => $feedback->getPhone(),
            'message' => $feedback->getMessage(),
        ]);

        file_put_contents($this->filePath, $data . PHP_EOL, FILE_APPEND);
    }
}