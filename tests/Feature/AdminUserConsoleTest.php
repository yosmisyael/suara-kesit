<?php

use App\Models\Admin;
use Database\Seeders\DatabaseSeeder;

describe('AdminDashboardController', function () {
    beforeEach(function () {
        $this->seed(DatabaseSeeder::class);
        $this->admin = Admin::query()->where('username', 'alpha')->first();
    });

    it('should be able to access user overview page', function () {
        $this->actingAs($this->admin)
            ->get(route('admin.user.index'))
            ->assertStatus(200)
            ->assertViewIs('pages.admin.user-console');
    });
});
