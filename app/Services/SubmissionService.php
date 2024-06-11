<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface SubmissionService
{
    public function getUnreviewed(): Collection;

    public function getById(string $id): Model;

    public function create(array $data): bool;

    public function update(string $id, array $data): bool;
}
