<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface UserService
{
    public function create(UserDTO $userDTO): bool;

    public function all(): Collection;

    public function getByRole(string $role): Collection;

    public function findById(string $id): ?Model;

    public function findByUsername(string $username): ?User;

    public function update(string $id, array $data): bool;

    public function delete(string $id): ?bool;
}
