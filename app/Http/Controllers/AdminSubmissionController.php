<?php

namespace App\Http\Controllers;

use App\Services\SubmissionService;
use Illuminate\Http\Response;

class AdminSubmissionController extends Controller
{
    public function __construct(protected SubmissionService $submissionService)
    {
    }

    public function __invoke(): Response
    {
        return response()->view('pages.admin.submissions', [
            'title' => 'Post | Submission List',
            'submissions' => $this->submissionService->getUnreviewed(),
        ]);
    }
}
