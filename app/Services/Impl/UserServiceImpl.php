<?php

namespace App\Services\Impl;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class UserServiceImpl implements UserService
{
    public function create(array $data): bool
    {
        $user = new User($data);

        $data['role'] === 'member' ? $user->assignRole('member') : $user->assignRole('author');

        return $user->save();
    }

    public function all(): Collection
    {
        return User::all();
    }

    public function getByRole(string $role): Collection
    {
        $filter = [$role];

        return User::with('roles')->whereHas('roles', function ($query) use ($filter) {
            $query->whereIn('name', $filter);
        })->get();
    }

    public function findById(string $id): ?Model
    {
        return User::with('roles')->find($id);
    }

    public function findByUsername(string $username): ?User
    {
        return User::query()->where('username', $username)->get()->first();
    }

    public function update(string $id, array $data): bool
    {
        if (array_key_exists('role', $data) && isset($data['role']))
            User::query()->find($id)->syncRoles($data['role']);
        return User::query()->find($id)->update($data);
    }

    public function delete(string $id): bool|null {
        return User::query()->find($id)->delete();
    }
}
