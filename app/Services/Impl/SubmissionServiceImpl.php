<?php

namespace App\Services\Impl;

use App\Models\Submission;
use App\Services\SubmissionService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class SubmissionServiceImpl implements SubmissionService
{

    public function getUnreviewed(): Collection
    {
        return Submission::with(['post.user', 'review'])->whereDoesntHave('review')->get();
    }

    public function getById(string $id): Model
    {
        return Submission::with(['post.user', 'review'])->find($id);
    }

    public function create(array $data): bool
    {
        $submission = new Submission($data);

        return $submission->save();
    }
}
