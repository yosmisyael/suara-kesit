<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

interface UserService
{
    public function create(string $username, string $name, string $email, string $password): bool;

    public function findById(string $id): ?Model;

    public function findByUsername(string $username): ?User;

    public function update(string $id, array $data): bool;

    public function delete(string $id): ?bool;
}
