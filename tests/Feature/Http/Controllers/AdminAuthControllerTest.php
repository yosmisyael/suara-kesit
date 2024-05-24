<?php

use App\Models\Admin;
use Database\Seeders\AdminSeeder;

describe('AdminAuthController', function() {
    beforeEach(function() {
        $this->seed(AdminSeeder::class);
        $this->admin = Admin::query()->where('username', 'alpha')->first();
    });

    it('should be able to access admin login page', function () {
        $this->get(route('admin.auth.login'))
            ->assertStatus(200)->assertSee('Administrator Login')->assertViewIs('pages.admin.login');
    });

    it('should be able to login as admin', function () {
        $this->post(route('admin.auth.authenticate'), [
            'username' => 'alpha',
            'password' => 'password',
        ])->assertRedirect(route('admin.dashboard'));
    });

    it('should not be able to login with wrong credentials', function () {
        $this->post(route('admin.auth.authenticate'), [
            'username' => 'alpha',
            'password' => 'wrong',
        ])->assertRedirect(route('admin.auth.login'))->assertSessionHasErrors(['error' => 'Username or password is wrong.']);
    });

    it('should be able to logout as admin', function () {
        $this->actingAs($this->admin)->delete(route('admin.auth.logout'))->assertRedirect(route('admin.auth.login'));
    });
});
