<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewStoreRequest;
use App\Services\ReviewService;
use App\Services\SubmissionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class AdminReviewController extends Controller
{
    public function __construct(protected ReviewService $reviewService, protected SubmissionService $submissionService)
    {
    }

    public function show(string $id): Response
    {
        return response()->view('pages.admin.review-show', [
            'title' => 'Post | Submission Detail',
            'submission' => $this->submissionService->getById($id),
            'postId' => $id,
        ]);
    }

    public function create(string $id): Response
    {
        return response()->view('pages.admin.review', [
            'title' => 'Post | Submission Review',
            'submission' => $this->submissionService->getById($id),
        ]);
    }

    public function store(ReviewStoreRequest $request, string $id): RedirectResponse
    {
        $validated = $request->validated();

        $result = $this->reviewService->create($validated);

        if (!$result)
            return redirect(route('admin.review.create', ['id' => $id]))
                ->withErrors(['error', 'An error occurred when creating review.']);

        return redirect(route('admin.submission.index'))
            ->with('success', 'Submission has been reviewed.');
    }
}
