<?php

use App\Models\Admin;
use Database\Seeders\AdminSeeder;

describe('AdminDashboardController', function () {
    beforeEach(function () {
        $this->seed(AdminSeeder::class);
        $this->admin = Admin::query()->first();
    });

    it('should be able to access admin dashboard', function () {
        $this->actingAs($this->admin, 'admin')
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertViewIs('pages.admin.index');
    });
});
