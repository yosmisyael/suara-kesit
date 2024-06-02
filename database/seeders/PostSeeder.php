<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->whereHas('roles', function ($query) {
            $query->where('name', 'author');
        })->first();
        Post::withoutEvents(function () use($user) {
            $post = new Post([
                'title' => 'example',
                'slug' => 'example',
                'content' => 'example',
                'user_id' => $user->id,
            ]);
            $post->save();
        });
    }
}
