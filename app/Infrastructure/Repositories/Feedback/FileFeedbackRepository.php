<?php

namespace App\Infrastructure\Repositories\Feedback;

use App\Domain\Feedback\Feedback;

class FileFeedbackRepository implements FeedbackRepositoryInterface
{
    protected $filePath;
    protected $fileName = 'feedback';

    public function __construct()
    {
        $this->filePath = config('app.storage_path');
    }

    public function save(Feedback $feedback)
    {
        $fullFileName = $this->filePath . $this->fileName . '.json';
        $data = json_encode([
            'name' => $feedback->getName(),
            'phone' => $feedback->getPhone(),
            'message' => $feedback->getMessage(),
        ]);

        !is_dir($this->filePath) && !mkdir($this->filePath, 0777, true);

        file_put_contents($fullFileName, $data . PHP_EOL, FILE_APPEND);
    }
}
