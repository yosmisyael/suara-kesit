<?php

namespace App\Services;

use App\Models\AuthorApplication;
use Illuminate\Support\Collection;

interface AuthorApplicationService
{
    public function create(array $data): bool;
    public function all(): Collection;

    public function approve(string $applicationId): bool;

    public function deny(string $applicationId): bool;
}
