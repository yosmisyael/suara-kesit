<?php

use App\Models\Admin;
use App\Models\AuthorApplication;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Str;

describe('AdminApplicationController', function () {
    beforeEach(function () {
        $this->seed(DatabaseSeeder::class);
        $this->admin = Admin::query()->first();
    });

    it('it should be able to access user application page', function () {
        $this->actingAs($this->admin, 'admin')
            ->get(route('admin.application.index'))
            ->assertOk()
            ->assertViewIs('pages.admin.applications');
    });

    it('should be able to access application review page', function () {
        $application = AuthorApplication::query()->first();
        $this->actingAs($this->admin, 'admin')
            ->get(route('admin.application.edit', ['id' => $application->id]))
            ->assertOk()
            ->assertViewIs('pages.admin.application');
    });

    it('should be able to verify user application', function () {
        $application = AuthorApplication::query()->first();
        $this->actingAs($this->admin, 'admin')
            ->patch(route('admin.application.verify', ['id' => $application->id]))
            ->assertRedirect(route('admin.application.edit', ['id' => $application->id]))
            ->assertSessionHas('success', 'Application approved, user role changed to author successfully.');
    });

    it('should be able to reject user application if token is unauthorized', function () {
        $user = new User([
            'name' => 'beta',
            'email' => 'beta@test.com',
            'password' => bcrypt('password'),
            'username' => 'beta',
        ]);
        $user->save();
        $user->assignRole('member');

        $application = new AuthorApplication([
            'user_id' => $user->id,
            'token' => Str::uuid(),
        ]);
        $application->save();

        $this->actingAs($this->admin, 'admin')
            ->patch(route('admin.application.verify', ['id' => $application->id]))
            ->assertRedirect(route('admin.application.edit', ['id' => $application->id]))
            ->assertSessionHasErrors(['error' => 'Token is unauthorized.']);
    });
});
