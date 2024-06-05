<?php

namespace App\Services\Impl;

use App\AuthorApplicationStatus;
use App\Models\AuthorApplication;
use App\Models\Token;
use App\Services\AuthorApplicationService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class AuthorApplicationServiceImpl implements AuthorApplicationService
{

    public function create(array $data): bool
    {
        $application = new AuthorApplication($data);
        return $application->save();
    }

    public function all(): Collection
    {
        return AuthorApplication::with('user')->get();
    }

    public function verify(string $applicationId): bool
    {
        return DB::transaction(function () use ($applicationId) {
            $application = AuthorApplication::query()->find($applicationId);

            $token = Token::query()->where('token', '=', $application->id)->first();

            if (!$token) {
                AuthorApplication::query()->find($applicationId)->update([
                    'status' => AuthorApplicationStatus::Rejected
                ]);
                return false;
            }

            $activateToken = Token::query()->find($token->id)->update([
                'is_active' => true
            ]);

            if (!$activateToken) return false;

            $result = $application->update([
                'status' => AuthorApplicationStatus::Approved
            ]);

            if (!$result) return false;

            return true;
        });
    }
}
