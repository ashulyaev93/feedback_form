<?php

namespace App\Application\Services;

use App\Domain\Feedback\Feedback;
use App\Infrastructure\FeedbackDto;
use App\Infrastructure\Repositories\Feedback\FeedbackRepositoryInterface;
use App\Infrastructure\Repositories\Feedback\HybridFeedbackRepository;

class FeedbackService
{
    protected FeedbackRepositoryInterface $feedbackRepository;
    protected HybridFeedbackRepository $hybridFeedbackRepository;

    public function __construct(FeedbackRepositoryInterface $feedbackRepository, HybridFeedbackRepository $hybridFeedbackRepository)
    {
        $this->feedbackRepository = $feedbackRepository;
        $this->hybridFeedbackRepository = $hybridFeedbackRepository;
    }

    public function createFeedback(FeedbackDto $feedbackDto)
    {
        $feedback = new Feedback(
            $feedbackDto->name,
            $feedbackDto->phone,
            $feedbackDto->message
        );

        //Для сохранения и в базу и в документ
        $this->hybridFeedbackRepository->save($feedback);

        //Для гибкого расширения FeedbackRepositoryInterface но с перезаписью в интерфейсе и сохранение в один из имплементирующих классов
        //$this->feedbackRepository->save($feedback);
    }
}
