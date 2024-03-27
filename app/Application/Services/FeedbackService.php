<?php

namespace App\Application\Services;

use App\Domain\Feedback\Feedback;
use App\Infrastructure\Repositories\FeedbackRepositoryInterface;

class FeedbackService
{
    protected FeedbackRepositoryInterface $feedbackRepository;

    public function __construct(FeedbackRepositoryInterface $feedbackRepository)
    {
        $this->feedbackRepository = $feedbackRepository;
    }

    public function createFeedback(string $name, string $phone, string $message): void
    {
        $feedback = new Feedback($name, $phone, $message);

        $this->feedbackRepository->save($feedback);
    }
}
