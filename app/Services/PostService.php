<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface PostService
{
    public function all(): Collection;

    public function getPublished(): Collection;

    public function getById(string $id): Model;

    public function getByTitle(string $title): Collection;

    public function create(array $data): bool;

    public function update(string $id, array $data): bool;

    public function delete(string $id): bool|null;
}
