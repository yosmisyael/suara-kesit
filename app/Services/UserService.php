<?php

namespace App\Services;

use App\Models\User;

interface UserService
{
    public function create(string $username, string $name, string $email, string $password): bool;

    public function findByUsername(string $username): ?User;

    public function update(string $id, array $data): bool;

    public function delete(string $id): ?bool;
}
