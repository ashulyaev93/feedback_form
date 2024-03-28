<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Feedback\Feedback;

interface FeedbackRepositoryInterface
{
    public function save(Feedback $feedback);
}