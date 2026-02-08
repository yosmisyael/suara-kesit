<?php

namespace App\Services;

use App\Enums\EditorialAction;
use App\Enums\PostStatus;
use App\Models\Editorial;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Throwable;

class EditorialService
{
    /**
     * @throws Throwable
     */
    public function submitForReview(User $user, Post $post, ?string $note = null): bool
    {
        // ignore if post already published
        if ($post->status === PostStatus::PUBLISHED) {
            return false;
        }

        // check if the post already submitted and still in pending state
        if ($post->status === PostStatus::PENDING) {
            return false;
        }

        return DB::transaction(function () use ($user, $post, $note) {
            // update post status
            $post->update(['status' => PostStatus::PENDING]);

            // create editorial record
            Editorial::query()->create([
                'user_id' => $user->id,
                'post_id' => $post->id,
                'action' => EditorialAction::PENDING,
                'review' => $note,
            ]);

            return true;
        });
    }
}
