<?php

use App\Models\Post;
use App\Models\User;
use App\Services\PostService;
use Database\Seeders\PostSeeder;
use Database\Seeders\RolesAndPermissionSeeder;
use Database\Seeders\UserSeeder;

describe('PostService', function () {
    beforeEach(function () {
        $this->postService = app()->make(PostService::class);
        $this->seed([RolesAndPermissionSeeder::class, UserSeeder::class]);
        $this->user = User::query()->where('username', '=', 'zeta')->first();
    });

    it('should be able to create post', function () {
        expect($this->actingAs($this->user)
            ->postService->create([
                'title' => 'dummy',
                'content' => 'dummy',
            ]))->toBeTrue();
    });

    it('should be able to update post', function () {
        $this->seed(PostSeeder::class);
        $post = Post::query()->where('title', '=', 'example')->first();
        expect($this->actingAs($this->user)
            ->postService->update($post->id, [
                'title' => 'example (updated)',
            ]))->toBeTrue();
    });

    it('should be able to delete post', function () {
        $this->seed(PostSeeder::class);
        $post = Post::query()->where('title', '=', 'example')->first();
        expect($this->actingAs($this->user)
            ->postService->delete($post->id))->toBeTrue()
                ->and(Post::query()->find($post->id))->toBeNull();
    });

    it('should be able to get all post', function () {
        Post::withoutEvents(function () {
            return Post::factory()->count(5)->create();
        });

        expect($this->actingAs($this->user)
            ->postService->all()->count())->toBe(5);
    });

    it('should be able to get post by title', function () {
        $this->seed(PostSeeder::class);
        expect($this->actingAs($this->user)
            ->postService->getByTitle('example')->count())->toBe(2);
    });

    it('should be able to get post by id', function () {
        $this->seed(PostSeeder::class);
        $post = Post::query()->where('title', '=', 'example')->first();
        expect($this->actingAs($this->user)
            ->postService->getById($post->id)->count())->toBe(2);
    });

    it('should be able to get published posts', function () {
        $this->seed(PostSeeder::class);
        expect($this->postService->getPublished()->count())->toBe(1);
    });
});
