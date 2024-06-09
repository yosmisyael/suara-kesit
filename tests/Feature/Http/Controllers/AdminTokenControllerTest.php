<?php

use App\Models\Admin;
use Database\Seeders\DatabaseSeeder;

describe('AdminApplicationController', function () {
    beforeEach(function () {
        $this->seed(DatabaseSeeder::class);
        $this->admin = Admin::query()->first();
    });

    it('it should be able to access token page', function () {
        $this->actingAs($this->admin, 'admin')
            ->get(route('admin.token.index'))
            ->assertOk()
            ->assertViewIs('pages.admin.tokens');
    });

    it('should be able to issue new token', function () {
        $this->actingAs($this->admin, 'admin')
            ->get(route('admin.token.store'))
            ->assertOk()
            ->assertViewIs('pages.admin.token-create');
    });
});
