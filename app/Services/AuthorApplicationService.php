<?php

namespace App\Services;

interface AuthorApplicationService
{
    public function approve(string $applicationId): bool;

    public function deny(string $applicationId): bool;
}
