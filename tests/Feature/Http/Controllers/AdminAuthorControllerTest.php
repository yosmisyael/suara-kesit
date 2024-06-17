<?php

use App\Models\Admin;
use Database\Seeders\DatabaseSeeder;

describe('AdminUserController', function () {
    beforeEach(function () {
        $this->seed(DatabaseSeeder::class);
        $this->admin = Admin::query()->where('username', 'alpha')->first();
    });

    it('should be able to access author list page', function () {
        $this->actingAs($this->admin, 'admin')
            ->get(route('admin.user.author'))
            ->assertStatus(200)
            ->assertViewIs('pages.admin.user-author');
    });
});
