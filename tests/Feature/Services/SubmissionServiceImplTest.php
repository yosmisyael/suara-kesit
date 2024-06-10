<?php

use App\Enums\Status;
use App\Models\Post;
use App\Models\Submission;
use App\Models\User;
use App\Services\SubmissionService;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\SubmissionSeeder;
use Illuminate\Database\Eloquent\Builder;

describe('SubmissionServiceImpl', function () {
    beforeEach(function () {
        $this->submissionService = app()->make(SubmissionService::class);
        $this->seed(DatabaseSeeder::class);
        $this->user = User::query()->whereHas('roles', function (Builder $query) {
            $query->where('name', '=', 'author');
        })->first();
    });

    it('should be able to create submission', function () {
        $post = Post::query()->first();
        expect($this->submissionService->create([
            'post_id' => $post->id
        ]))->toBeTrue();
    });

    it('should be able to get submissions by status', function () {
        $this->seed(SubmissionSeeder::class);
        expect($this->submissionService->getByStatus(Status::Pending)->count())->toBe(1);
    });

    it('should be able to get submission by id', function () {
        $this->seed(SubmissionSeeder::class);
        $submission = Submission::query()->first();
        expect($this->submissionService->getById($submission->id)->count())->toBe(1);
    });

    it('should be able to update submission', function () {
        $this->seed(SubmissionSeeder::class);
        $submission = Submission::query()->first();
        expect($this->submissionService->update($submission->id, [
            'status' => Status::Approved
        ]))->toBeTrue()
            ->and(Submission::query()->find($submission->id)->status)->toBe(Status::Approved);
    });
});
