<?php

namespace App\Services;

interface PostService
{
    public function all();

    public function getById(string $id);

    public function getByTitle(string $title);

    public function create(array $data);

    public function update(string $id, array $data);

    public function delete(string $id);
}
