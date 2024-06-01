<?php

namespace App\Services\Impl;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class PostServiceImpl implements PostService
{

    public function all(): Collection
    {
        return Post::all();
    }

    public function getById(string $id): Model
    {
        return Post::query()->find($id);
    }

    public function getByTitle(string $title): Collection
    {
        return Post::query()->where('title', $title)->orWhere('title', 'like', "%$title%")->get();
    }

    public function create(array $data): bool
    {
        $post = new Post($data);
        return $post->save();
    }

    public function update(string $id, array $data): bool
    {
        return Post::query()->where('id', $id)->update($data);
    }

    public function delete(string $id): bool|null
    {
        return Post::query()->where('id', $id)->delete();
    }
}
