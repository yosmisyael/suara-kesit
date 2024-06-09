<?php

use App\Models\Admin;
use App\Models\AuthorApplication;
use Database\Seeders\DatabaseSeeder;

describe('AdminApplicationController', function () {
    beforeEach(function () {
        $this->seed(DatabaseSeeder::class);
        $this->admin = Admin::query()->first();
    });

    it('it should be able to access user application page', function () {
        $this->actingAs($this->admin, 'admin')
            ->get(route('admin.application.index'))
            ->assertOk()
            ->assertViewIs('pages.admin.user-application');
    });

    it('should be able to access application review page', function () {
        $application = AuthorApplication::query()->first();
        $this->actingAs($this->admin, 'admin')
            ->get(route('admin.application.review', ['id' => $application->id]))
            ->assertOk()
            ->assertViewIs('pages.admin.user-application-review');
    });

    it('should be able to verify user application', function () {
        $application = AuthorApplication::query()->first();
        $this->actingAs($this->admin, 'admin')
            ->patch(route('admin.application.verification', ['id' => $application->id]))
            ->assertRedirect(route('admin.application.review', ['id' => $application->id]))
            ->assertSessionHas('success', 'Application approved, user role changed to author successfully.');
    });

    it('should be able to reject user application if token is unauthorized', function () {
        $user = new \App\Models\User([
            'name' => 'beta',
            'email' => 'beta@test.com',
            'password' => bcrypt('password'),
            'username' => 'beta',
        ]);
        $user->save();
        $user->assignRole('member');

        $application = new AuthorApplication([
            'user_id' => $user->id,
            'token' => \Illuminate\Support\Str::uuid(),
        ]);
        $application->save();

        $this->actingAs($this->admin, 'admin')
            ->patch(route('admin.application.verification', ['id' => $application->id]))
            ->assertRedirect(route('admin.application.review', ['id' => $application->id]))
            ->assertSessionHasErrors(['error' => 'Token is unauthorized.']);
    });
});
