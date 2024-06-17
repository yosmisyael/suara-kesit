<?php

namespace App\Services\Impl;

use App\Enums\Status;
use App\Models\Post;
use App\Models\Review;
use App\Models\Submission;
use App\Services\ReviewService;
use Illuminate\Support\Facades\DB;

class ReviewServiceImpl implements ReviewService
{
    public function create(array $data): bool
    {
        return DB::transaction(function () use ($data) {
            $review = new Review($data);

            $postId = Submission::query()->find($data['submission_id'])->getAttribute('post_id');

            if (Status::from($data['status']) === Status::Approved) {
                Post::query()->find($postId)->update([
                    'is_published' => true
                ]);
            }

            return $review->save();
        });
    }
}
