<?php

namespace App\Services;

use Illuminate\Support\Collection;

interface AuthorApplicationService
{
    public function all(): Collection;

    public function approve(string $applicationId): bool;

    public function deny(string $applicationId): bool;
}
