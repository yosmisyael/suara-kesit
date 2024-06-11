<?php

namespace App\Services;

interface ReviewService
{
    public function create(array $data): bool;
}
