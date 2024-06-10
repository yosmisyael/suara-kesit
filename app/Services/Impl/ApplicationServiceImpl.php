<?php

namespace App\Services\Impl;

use App\Enums\Status;
use App\Models\Application;
use App\Models\Token;
use App\Models\User;
use App\Services\ApplicationService;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ApplicationServiceImpl implements ApplicationService
{

    public function create(array $data): bool
    {
        $isMember = User::with('roles')->find($data['user_id'])->roles->first()->getAttribute('name') === 'member';

        if (!$isMember) return false;

        $application = new Application($data);

        $token = Token::query()->where('token', '=', $application->token)->first();

        $token?->update([
            'is_active' => true
        ]);

        return $application->save();
    }

    public function all(): Collection
    {
        return Application::with('user')->get();
    }

    public function getById(string $id): Model|null
    {
        return Application::with('user')->find($id);
    }

    public function verify(string $applicationId): bool
    {
        return DB::transaction(function () use ($applicationId) {
            $application = Application::query()->find($applicationId);

            $user = User::with('roles')->find($application->user_id);

            $isMember = $user->roles->first()->getAttribute('name') === 'member';

            if (!$isMember) return false;

            $token = Token::query()->where('token', '=', $application->token)->first();

            if (!$token) {
                Application::query()->find($applicationId)->update([
                    'status' => Status::Rejected
                ]);
                throw new Exception('Token is unauthorized.');
            }

            $activateToken = Token::query()->find($token->id)->update([
                'is_active' => true
            ]);

            if (!$activateToken) return false;

            $result = $application->update([
                'status' => Status::Approved,
                'token_id' => $token->id
            ]);

            $user->syncRoles('author');

            if (!$result) return false;

            return true;
        });
    }
}
