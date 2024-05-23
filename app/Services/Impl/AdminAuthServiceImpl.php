<?php

namespace App\Services\Impl;

use App\Services\AdminAuthService;
use Illuminate\Support\Facades\Auth;

class AdminAuthServiceImpl implements AdminAuthService
{

    public function login(string $username, string $password): bool
    {
        $credentials = [
            'username' => $username,
            'password' => $password
        ];

        return Auth::guard('admin')->attempt($credentials);

    }

    public function logout(): void
    {
        Auth::guard('admin')->logout();
    }
}
