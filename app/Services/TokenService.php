<?php

namespace App\Services;

use Illuminate\Support\Collection;

interface TokenService
{
    public function all(): Collection;

    public function create(): bool;
}
