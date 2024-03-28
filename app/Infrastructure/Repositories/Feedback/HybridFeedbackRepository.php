<?php

namespace App\Infrastructure\Repositories\Feedback;

use App\Domain\Feedback\Feedback;

class HybridFeedbackRepository implements FeedbackRepositoryInterface
{
    private $databaseRepository;
    private $fileRepository;

    public function __construct(DatabaseFeedbackRepository $databaseRepository, FileFeedbackRepository $fileRepository)
    {
        $this->databaseRepository = $databaseRepository;
        $this->fileRepository = $fileRepository;
    }

    public function save(Feedback $feedback): bool
    {
        $databaseSuccess = $this->databaseRepository->save($feedback);
        $fileSuccess = $this->fileRepository->save($feedback);

        // Возвращаем true, если данные успешно сохранены как в базу, так и в файл
        return $databaseSuccess && $fileSuccess;
    }
}
