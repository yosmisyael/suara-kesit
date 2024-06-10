<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Http\Requests\UpdateSubmissionRequest;
use App\Services\SubmissionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class AdminSubmissionController extends Controller
{
    public function __construct(protected SubmissionService $submissionService)
    {
    }

    public function index(): Response
    {
        return response()->view('pages.admin.submissions', [
            'title' => 'Post | Submission List',
            'submissions' => $this->submissionService->getByStatus(Status::Pending),
        ]);
    }

    public function edit(string $id): Response
    {
        return response()->view('pages.admin.submission', [
            'title' => 'Post | Submission Review',
            'submission' => $this->submissionService->getById($id),
        ]);
    }

    public function update(UpdateSubmissionRequest $request, string $id): RedirectResponse
    {
        $validated = $request->validated();

        $result = $this->submissionService->update($id, [
            'status' => $validated['status'],
            'id' => $validated['id'],
        ]);

        if (!$result)
            return redirect(route('admin.submission.edit', ['id' => $id]))
                ->withErrors(['error', 'An error occurred when updating submission.']);

        return redirect(route('admin.submission.index'))
            ->with('success', 'Submission updated successfully.');
    }
}
