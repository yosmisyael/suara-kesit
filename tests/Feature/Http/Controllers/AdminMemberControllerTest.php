<?php

use App\Models\Admin;
use Database\Seeders\DatabaseSeeder;

describe('AdminUserController', function () {
    beforeEach(function () {
        $this->seed(DatabaseSeeder::class);
        $this->admin = Admin::query()->where('username', 'alpha')->first();
    });

    it('should be able to access member list page', function () {
        $this->actingAs($this->admin, 'admin')
            ->get(route('admin.user.member'))
            ->assertStatus(200)
            ->assertViewIs('pages.admin.user-member');
    });
});
