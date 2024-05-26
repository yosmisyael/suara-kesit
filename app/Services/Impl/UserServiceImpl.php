<?php

namespace App\Services\Impl;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class UserServiceImpl implements UserService
{
    public function create(string $username, string $name, string $email, string $password): bool
    {
        $user = new User([
            'username' => $username,
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
        return $user->save();
    }

    public function all(): Collection
    {
        return User::all();
    }

    public function findById(string $id): ?Model
    {
        return User::query()->find($id);
    }

    public function findByUsername(string $username): ?User
    {
        return User::query()->where('username', $username)->get()->first();
    }

    public function update(string $id, array $data): bool
    {
        return User::query()->find($id)->update($data);
    }

    public function delete(string $id): bool|null {
        return User::query()->find($id)->delete();
    }
}
