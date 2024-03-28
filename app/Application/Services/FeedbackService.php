<?php

namespace App\Application\Services;

use App\Domain\Feedback\Feedback;
use App\Infrastructure\FeedbackDto;
use App\Infrastructure\Repositories\FeedbackRepositoryInterface;

class FeedbackService
{
    protected FeedbackRepositoryInterface $feedbackRepository;

    public function __construct(FeedbackRepositoryInterface $feedbackRepository)
    {
        $this->feedbackRepository = $feedbackRepository;
    }

    public function createFeedback(FeedbackDto $feedbackDto)
    {
        $feedback = new Feedback(
            $feedbackDto->name,
            $feedbackDto->phone,
            $feedbackDto->message
        );

        $this->feedbackRepository->save($feedback);
    }
}
