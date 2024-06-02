<?php

use App\Models\Admin;
use Database\Seeders\AdminSeeder;

describe('DenyAuthenticatedAdmin', function () {
    beforeEach(function () {
        $this->seed(AdminSeeder::class);
        $this->admin = Admin::query()->where('username', 'alpha')->first();
    });

    it('should deny access to the login page when authenticated', function () {
        $this->actingAs($this->admin, 'admin')
            ->get(route('admin.auth.login'))
            ->assertRedirect(route('admin.dashboard'));
    });

    it('should deny login request when authenticated', function () {
        $this->actingAs($this->admin, 'admin')
            ->post(route('admin.auth.authenticate'), [
                'username' => 'alpha',
                'password' => 'password',
            ])->assertRedirect(route('admin.dashboard'));
    });
});
