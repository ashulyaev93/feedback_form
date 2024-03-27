<?php

namespace App\Application\Controllers;

use App\Application\Services\FeedbackService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    protected FeedbackService $feedbackService;

    public function __construct(FeedbackService $feedbackService)
    {
        $this->feedbackService = $feedbackService;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        $this->feedbackService->createFeedback(
            $validatedData['name'],
            $validatedData['phone'],
            $validatedData['message']
        );

        return response()->json(['message' => 'Feedback created successfully'], 201);
    }
}
