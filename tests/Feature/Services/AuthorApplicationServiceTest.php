<?php

use App\Models\AuthorApplication;
use App\Models\User;
use App\Services\AuthorApplicationService;
use Database\Seeders\AuthorApplicationSeeder;
use Database\Seeders\RolesAndPermissionSeeder;
use Database\Seeders\TokenSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Str;

describe('AuthorApplicationService', function() {
    beforeEach(function () {
        $this->authorApplicationService = app()->make(AuthorApplicationService::class);
        $this->seed([RolesAndPermissionSeeder::class, UserSeeder::class]);
        $this->user = User::query()->where('username', '=', 'alpha')->first();
    });

    it('should be able to make author application', function () {
        expect($this->authorApplicationService->create([
            'user_id' => $this->user->id,
            'token' => Str::uuid(),
        ]))->toBeTrue();
    });

    it('should be able to reject author application request when user role is already author', function () {
        $user = User::query()->where('username', '=', 'zeta')->first();
        expect($this->authorApplicationService->create([
            'user_id' => $user->id,
            'token' => Str::uuid(),
        ]))->toBeFalse();
    });

    it('should be able to verify author application', function () {
        $this->seed([TokenSeeder::class, AuthorApplicationSeeder::class]);
        $application = AuthorApplication::query()->where('user_id', $this->user->id)->first();
        expect($this->authorApplicationService->verify($application->id))->toBeTrue();
    });

    it('should be able to reject author application if token is invalid', function () {
        expect($this->authorApplicationService->create([
            'user_id' => $this->user->id,
            'token' => Str::uuid(),
        ]))->toBeTrue();
        $application = AuthorApplication::query()->where('user_id', $this->user->id)->first();
        expect($this->authorApplicationService->verify($application->id))->toBeFalse();
    });

    it('should be able to list all applications', function () {
        $this->seed([TokenSeeder::class, AuthorApplicationSeeder::class]);
        expect($this->authorApplicationService->all()->count())->toBe(1);
    });
});
