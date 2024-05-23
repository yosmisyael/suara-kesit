<?php

use App\Services\AdminAuthService;
use Database\Seeders\AdminSeeder;

describe('AdminAuthService', function() {
    beforeEach(function() {
        $this->adminAuthService = app()->make(AdminAuthService::class);
        $this->seed(AdminSeeder::class);
    });

    it('should be able to login as admin', function() {
        expect($this->adminAuthService->login('alpha', 'password'))->toBeTrue();
    });

    it('should return false for login attempts with invalid credentials', function () {
        expect($this->adminAuthService->login('alpha', 'wrong'))->toBeFalse();
    });

    it('should be able to logout as admin', function() {
        $this->adminAuthService->login('alpha', 'password');
        $this->assertAuthenticated('admin');

        $this->adminAuthService->logout();
        expect(auth('admin')->user())->toBeNull();
    });
});
