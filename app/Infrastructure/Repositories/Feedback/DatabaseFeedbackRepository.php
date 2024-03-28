<?php

namespace App\Infrastructure\Repositories\Feedback;

use App\Application\Services\DatabaseConnect;
use App\Domain\Feedback\Feedback;

class DatabaseFeedbackRepository implements FeedbackRepositoryInterface
{
    public function save(Feedback $feedback)
    {
        $feedbackModel = new Feedback($feedback->getName(), $feedback->getPhone(), $feedback->getMessage());

        $databaseConnect = new DatabaseConnect();
        $feedbackRepository = new SqlFeedbackRepository($databaseConnect);
        $feedbackRepository->saveFeedback($feedbackModel);
    }
}
