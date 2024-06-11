<?php

namespace App\Services\Impl;

use App\Models\Review;
use App\Services\ReviewService;

class ReviewServiceImpl implements ReviewService
{

    public function create(array $data): bool
    {
        $review = new Review($data);
        return $review->save();
    }
}
