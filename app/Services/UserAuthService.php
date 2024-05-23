<?php

namespace App\Services;

interface UserAuthService
{
    public function register(string $email, string $name, string $username, string $password): bool;

    public function login(string $email, string $password): bool;

    public function logout(): void;
}
