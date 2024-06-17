<?php

use App\Models\Post;
use App\Models\Submission;
use App\Services\ReviewService;
use Database\Seeders\DatabaseSeeder;

describe('ReviewServiceImpl', function () {
    beforeEach(function () {
        $this->reviewService = app()->make(ReviewService::class);
        $this->seed(DatabaseSeeder::class);
    });

    it('should be able to create a new review', function () {
        $submissionId = Submission::query()->first()->getAttribute('id');
        expect($this->reviewService->create([
            'submission_id' => $submissionId,
            'status' => 'approved',
            'note' => 'great'
        ]))->toBeTrue()
            ->and(Post::query()->whereHas('submissions')->first()->getAttribute('is_published'))->toBeTrue();
    });
});
