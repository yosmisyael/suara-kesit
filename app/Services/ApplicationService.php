<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ApplicationService
{
    public function create(array $data): bool;

    public function all(): Collection;

    public function getById(string $id): Model|null;

    public function verify(string $applicationId): bool;
}
