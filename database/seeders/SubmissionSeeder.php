<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Submission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubmissionSeeder extends Seeder
{
    public function run(): void
    {
        $post = Post::query()->where('title', 'example')->first();

        $submission = new Submission([
            'post_id' => $post->id,
        ]);

        $submission->save();
    }
}
