<?php

namespace App\Services\Impl;

use App\Models\Post;
use App\Models\Review;
use App\Models\Submission;
use App\Services\ReviewService;

class ReviewServiceImpl implements ReviewService
{

    public function create(array $data): bool
    {
        $review = new Review($data);

        $postId = Submission::query()->find($data['submission_id'])->post_id;

        if ($data['status'] === 'approved') {
            Post::query()->find($postId)->update([
                'is_published' => true
            ]);
        }

        return $review->save();
    }
}
