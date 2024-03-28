<?php

namespace App\Infrastructure\Repositories\Feedback;

use App\Domain\Feedback\Feedback;

interface FeedbackRepositoryInterface
{
    public function save(Feedback $feedback);
}
