<?php

use App\Models\Admin;
use Database\Seeders\AdminSeeder;

describe('AllowAuthenticatedAdmin', function () {
    beforeEach(function () {
        $this->seed(AdminSeeder::class);
        $this->admin = Admin::query()->where('username', 'alpha')->first();
    });

    it('should allow logout when authenticated', function () {
        $this->actingAs($this->admin, 'admin')
            ->delete(route('admin.auth.logout'))
            ->assertRedirect(route('admin.auth.login'));
    });

    it('should deny logout when not authenticated', function () {
        $this->delete(route('admin.auth.logout'))
            ->assertRedirect(route('admin.auth.login'));
    });
});
