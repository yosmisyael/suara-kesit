<?php

use App\Models\Admin;
use App\Models\Post;
use Database\Seeders\DatabaseSeeder;

describe('AdminPostController', function () {
    beforeEach(function () {
        $this->seed(DatabaseSeeder::class);
        $this->admin = Admin::query()->first();
    });

    it('should be able to access post listing page', function () {
        $this->actingAs($this->admin, 'admin')->get(route('admin.post.index'))
            ->assertViewIs('pages.admin.posts');
    });

    it('should be able to access post edit page', function () {
        $post = Post::query()->where('is_published', '=', true)->first();
        $this->actingAs($this->admin, 'admin')->get(route('admin.post.edit', ['id' => $post->id]))
            ->assertViewIs('pages.admin.post');
    });

    it('should be able to delete post', function () {
        $post = Post::query()->where('is_published', '=', true)->first();
        $this->actingAs($this->admin, 'admin')->delete(route('admin.post.delete', ['id' => $post->id]))
            ->assertRedirect(route('pages.admin.index'))
            ->assertSessionHas('success', 'Post has been taken down.');
    });
});
