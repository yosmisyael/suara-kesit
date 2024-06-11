<?php

use App\Models\Post;
use App\Models\Submission;
use App\Models\User;
use App\Services\SubmissionService;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Eloquent\Builder;

describe('SubmissionService', function () {
    beforeEach(function () {
        $this->submissionService = app()->make(SubmissionService::class);
        $this->seed(DatabaseSeeder::class);
        $this->user = User::query()->whereHas('roles', function (Builder $query) {
            $query->where('name', '=', 'author');
        })->first();
    });

    it('should be able to create submission', function () {
        $post = Post::query()->where('slug', 'example-draft')->first();
        expect($this->submissionService->create([
            'post_id' => $post->id
        ]))->toBeTrue();
    });

    it('should be able to get unreviewed submissions', function () {
        expect($this->submissionService->getUnreviewed()->count())->toBe(1);
    });

    it('should be able to get submission by id', function () {
        $submission = Submission::query()->first();
        expect($this->submissionService->getById($submission->id)->count())->toBe(1);
    });
});
