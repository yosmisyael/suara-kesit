<?php

use App\Models\Application;
use App\Models\User;
use App\Services\AuthorApplicationService;
use Database\Seeders\AuthorApplicationSeeder;
use Database\Seeders\RolesAndPermissionSeeder;
use Database\Seeders\TokenSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Str;

describe('AuthorApplicationService', function () {
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
        $application = Application::query()->where('user_id', $this->user->id)->first();
        expect($this->authorApplicationService->verify($application->id))->toBeTrue();
    });

    it('should be able to reject author application if token is invalid', function () {
        $this->expectException(Exception::class);
        expect($this->authorApplicationService->create([
            'user_id' => $this->user->id,
            'token' => Str::uuid(),
        ]))->toBeTrue();
        $application = Application::query()->where('user_id', $this->user->id)->first();
        expect($this->authorApplicationService->verify($application->id))->toThrow(Exception::class, 'Token is unauthorized.');
    });

    it('should be able to list all applications', function () {
        $this->seed([TokenSeeder::class, AuthorApplicationSeeder::class]);
        expect($this->authorApplicationService->all()->count())->toBe(1);
    });

    it('should be able to get application by id', function () {
        $this->seed([TokenSeeder::class, AuthorApplicationSeeder::class]);
        $application = Application::query()->where('user_id', $this->user->id)->first();
        expect($this->authorApplicationService->getById($application->id)->getAttribute('user_id'))->toBe($this->user->id);
    });
});
