<?php

namespace App\Application\Controllers;

use App\Application\Services\FeedbackService;
use App\Http\Controllers\Controller;
use App\Infrastructure\FeedbackDto;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    protected FeedbackService $feedbackService;

    public function __construct(FeedbackService $feedbackService)
    {
        $this->feedbackService = $feedbackService;
    }

    public function create(Request $request)
    {
        $dto = FeedbackDto::fromRequest($request);
        $this->feedbackService->createFeedback($dto);

        return response()->json(['message' => 'Feedback created successfully'], 201);
    }
}
