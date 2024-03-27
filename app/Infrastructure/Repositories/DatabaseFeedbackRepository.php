<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Feedback\Feedback;

class DatabaseFeedbackRepository implements FeedbackRepositoryInterface
{
    public function save(Feedback $feedback): void
    {
        $feedbackModel = new Feedback($feedback->getName(), $feedback->getPhone(), $feedback->getMessage());
        $feedbackModel->save();
    }
}