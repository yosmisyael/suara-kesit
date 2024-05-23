<?php

namespace App\Services\Impl;

use App\Models\User;
use App\Services\UserAuthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthServiceImpl implements UserAuthService
{
    public function login(string $email, string $password): bool
    {
        $credentials = [
            'email' => $email,
            'password' => $password,
        ];

        return Auth::attempt($credentials);
    }

    public function logout(): void
    {
        Auth::logout();
    }

    public function register(string $email, string $name, string $username, string $password): bool
    {
        $user = new User([
            'email' => $email,
            'name' => $name,
            'username' => $username,
            'password' => Hash::make($password),
        ]);

        return $user->save();
    }
}
