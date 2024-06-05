<?php

use App\Models\User;
use App\Services\AuthorApplicationService;
use Database\Seeders\RolesAndPermissionSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Str;

describe('AuthorApplicationService', function() {
    beforeEach(function () {
        $this->authorApplicationService = app()->make(AuthorApplicationService::class);
        $this->seed([RolesAndPermissionSeeder::class, UserSeeder::class]);
        $this->user = User::query()->where('username', '=', 'alpha')->first();
    });

    it('it should be able to make author application', function () {
        expect($this->authorApplicationService->create([
            'user_id' => $this->user->id,
            'token' => Str::uuid(),
        ]))->toBeTrue();
    });
});
