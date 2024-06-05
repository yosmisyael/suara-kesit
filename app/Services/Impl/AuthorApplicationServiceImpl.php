<?php

namespace App\Services\Impl;

use App\AuthorApplicationStatus;
use App\Models\AuthorApplication;
use App\Models\Token;
use App\Models\User;
use App\Services\AuthorApplicationService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class AuthorApplicationServiceImpl implements AuthorApplicationService
{

    public function create(array $data): bool
    {
        $isMember = User::with('roles')->find($data['user_id'])->roles->first()->getAttribute('name') === 'member';

        if (!$isMember) return false;

        $application = new AuthorApplication($data);
        return $application->save();
    }

    public function all(): Collection
    {
        return AuthorApplication::with('user')->get();
    }

    public function getById(string $id): Model|null
    {
        return AuthorApplication::with('user')->find($id);
    }

    public function verify(string $applicationId): bool
    {
        return DB::transaction(function () use ($applicationId) {
            $application = AuthorApplication::query()->find($applicationId);

            $isMember = User::with('roles')->find($application->user_id)->roles->first()->getAttribute('name') === 'member';

            if (!$isMember) return false;

            $token = Token::query()->where('token', '=', $application->token)->first();

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
