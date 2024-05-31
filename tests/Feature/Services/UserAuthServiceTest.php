<?php

use App\Services\UserAuthService;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\RolesAndPermissionSeeder;
use Database\Seeders\UserSeeder;

describe('UserAuthService', function() {
    beforeEach(function () {
        $this->seed([RolesAndPermissionSeeder::class, UserSeeder::class]);
        $this->userAuthService = app()->make(UserAuthService::class);
    });

    it('should return true for login attempts with valid credentials', function () {
        expect($this->userAuthService->login('alpha@test.com', 'password'))->toBeTrue();
    });

    it('should return false or login attempts with invalid credentials', function () {
        expect($this->userAuthService->login('alpha@test.com', 'wrong'))->toBeFalse();
    });

    it('should logout user', function () {
        $this->userAuthService->login('alpha@test.com', 'password');
        $this->assertAuthenticated();

        $this->userAuthService->logout();
        expect(auth()->user())->toBeNull();
    });

    it('should register user', function () {
        expect($this->userAuthService->register('test1@test.com', 'test1', 'test1', 'password'))->toBeTrue();
    });
});

