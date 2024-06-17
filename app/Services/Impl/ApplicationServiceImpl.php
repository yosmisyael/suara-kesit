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
        $user = User::with('roles')->find($data['user_id']);

        $isMember = $user->getRelation('roles')->first()->getAttribute('name') === 'member';

        if (!$isMember) return false;

        $application = new Application($data);

        $token = Token::query()->where('token', '=', $application->getAttribute('token'))->first();

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
        $application = Application::query()->find($applicationId);

        $user = User::with('roles')->find($application->getAttribute('user_id'));

        $isMember = $user->getRelation('roles')->first()->getAttribute('name') === 'member';

        if (!$isMember) return false;

        return DB::transaction(function () use ($application, $user) {

            $token = Token::query()->where('token', '=', $application->getAttribute('token'))->first();

            if (!$token) {
                Application::query()->find($application->getAttribute('id'))->update([
                    'status' => Status::Rejected
                ]);
                throw new Exception('Token is unauthorized.');
            }

            $tokenActivation = Token::query()->find($token->getAttribute('id'))->update([
                'is_active' => true,
                'application_id' => $application->getAttribute('id'),
            ]);

            if (!$tokenActivation) return false;

            $result = $application->update([
                'status' => Status::Approved,
            ]);

            if (!$result) return false;

            User::query()->where('id', $user->getAttribute('id'))->first()->syncRoles('author');

            return true;
        });
    }
}
