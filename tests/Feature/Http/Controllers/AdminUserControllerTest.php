<?php

use App\Models\Admin;
use App\Models\User;
use App\Services\UserService;
use Database\Seeders\DatabaseSeeder;

describe('AdminUserController', function () {
    beforeEach(function () {
        $this->userService = app()->make(UserService::class);
        $this->seed(DatabaseSeeder::class);
        $this->admin = Admin::query()->where('username', 'alpha')->first();
        $this->user = User::query()->where('username', 'alpha')->first();
    });

    it('should be able to access user overview page', function () {
        $this->actingAs($this->admin)
            ->get(route('admin.user.index'))
            ->assertStatus(200)
            ->assertViewIs('pages.admin.user');
    });

    it('should be able to access member list page', function () {
        $this->actingAs($this->admin)
            ->get(route('admin.user.member'))
            ->assertStatus(200)
            ->assertViewIs('pages.admin.user-member');
    });

    it('should be able to access author list page', function () {
        $this->actingAs($this->admin)
            ->get(route('admin.user.author'))
            ->assertStatus(200)
            ->assertViewIs('pages.admin.user-author');
    });

    it('should be able to access register user page', function () {
        $this->actingAs($this->admin)
            ->get(route('admin.user.create'))
            ->assertStatus(200)
            ->assertViewIs('pages.admin.user-create');
    });

    it('should be able to create new user', function () {
        $this->actingAs($this->admin)
            ->post(route('admin.user.store'), [
                'username' => 'beta',
                'email' => 'beta@example.com',
                'password' => 'P@assw0rd',
                'name' => 'beta',
                'role' => 'member'
            ])->assertStatus(302)->assertRedirect(route('admin.user.index'))
            ->assertSessionHas('success', 'User successfully created.');
    });

    it('should not be able to create user when name is empty', function () {
        $this->actingAs($this->admin)
            ->post(route('admin.user.store'), [
                'username' => 'beta',
                'email' => 'beta@example.com',
                'password' => 'P@assw0rd',
                'name' => '',
                'role' => 'member'
            ])->assertSessionHasErrors(['name' => 'The name field is required.']);
    });

    it('should not be able to create user when email is empty', function () {
        $this->actingAs($this->admin)
            ->post(route('admin.user.store'), [
                'username' => 'beta',
                'email' => '',
                'password' => 'P@assw0rd',
                'name' => 'beta',
                'role' => 'member'
            ])->assertSessionHasErrors(['email' => 'The email field is required.']);
    });

    it('should not be able to create user when email is already taken', function () {
        $this->actingAs($this->admin)
            ->post(route('admin.user.store'), [
                'username' => 'beta',
                'email' => 'alpha@test.com',
                'password' => 'P@assw0rd',
                'name' => 'beta',
                'role' => 'member'
            ])->assertSessionHasErrors(['email' => 'The email has already been taken.']);
    });

    it('should not be able to create user when username is empty', function () {
        $this->actingAs($this->admin)
            ->post(route('admin.user.store'), [
                'username' => '',
                'email' => 'beta@example.com',
                'password' => 'P@assw0rd',
                'name' => 'beta',
                'role' => 'member'
            ])->assertSessionHasErrors(['username' => 'The username field is required.']);
    });

    it('should not be able to create user when username is already taken', function () {
        $this->actingAs($this->admin)
            ->post(route('admin.user.store'), [
                'username' => 'alpha',
                'email' => 'beta@example.com',
                'password' => 'P@assw0rd',
                'name' => 'beta',
                'role' => 'member'
            ])->assertSessionHasErrors(['username' => 'The username has already been taken.']);
    });

    it('should not be able to create user when password not meet requirements (letter)', function () {
        $this->actingAs($this->admin)
            ->post(route('admin.user.store'), [
                'username' => 'beta',
                'email' => 'beta@example.com',
                'password' => '0987123#',
                'name' => 'beta',
                'role' => 'member'
            ])->assertSessionHasErrors(['password' => 'The password field must contain at least one letter.']);
    });

    it('should not be able to create user when password not meet requirements (mixed case)', function () {
        $this->actingAs($this->admin)
            ->post(route('admin.user.store'), [
                'username' => 'beta',
                'email' => 'beta@example.com',
                'password' => 'p@ssw0rd',
                'name' => 'beta',
                'role' => 'member'
            ])->assertSessionHasErrors(['password' => 'The password field must contain at least one uppercase and one lowercase letter.']);
    });

    it('should not be able to create user when password not meet requirements (symbol)', function () {
        $this->actingAs($this->admin)
            ->post(route('admin.user.store'), [
                'username' => 'beta',
                'email' => 'beta@example.com',
                'password' => 'Passw0rd',
                'name' => 'beta',
                'role' => 'member'
            ])->assertSessionHasErrors(['password' => 'The password field must contain at least one symbol.']);
    });

    it('should not be able to create user when password not meet requirements (number)', function () {
        $this->actingAs($this->admin)
            ->post(route('admin.user.store'), [
                'username' => 'beta',
                'email' => 'beta@example.com',
                'password' => 'Password',
                'name' => 'beta',
                'role' => 'member'
            ])->assertSessionHasErrors(['password' => 'The password field must contain at least one symbol.']);
    });

    it('should not be able to create user when role field is not sent', function () {
        $this->actingAs($this->admin)
            ->post(route('admin.user.store'), [
                'username' => 'beta',
                'email' => 'beta@example.com',
                'password' => 'Password',
                'name' => 'beta',
            ])->assertSessionHasErrors(['role' => 'The role field is required.']);
    });

    it('should not be able to create user when role field is invalid', function () {
        $this->actingAs($this->admin)
            ->post(route('admin.user.store'), [
                'username' => 'beta',
                'email' => 'beta@example.com',
                'password' => 'Password',
                'name' => 'beta',
                'role' => 'unknown'
            ])->assertSessionHasErrors(['role' => 'The selected role is invalid.']);
    });

    it('should be able to access user edit page', function () {
        $this->actingAs($this->admin)
            ->get(route('admin.user.edit', ['id' => $this->user->id]))
            ->assertStatus(200)
            ->assertViewIs('pages.admin.user-edit');
    });

    it('should be able to change user role', function () {
        $this->actingAs($this->admin)
            ->put(route('admin.user.update', ['id' => $this->user->id]), [
                'role' => 'author',
                'id' => $this->user->id
            ]);

        $user = User::with('roles')->find($this->user->id);
        expect($user->roles->count())->toBe(1)
            ->and($user->roles[0]->name)->toBe('author');
    });

    it('should be able to delete user', function () {
        $this->actingAs($this->admin)
            ->delete(route('admin.user.delete', ['id' => $this->user->id]))
                ->assertRedirect(route('admin.user.index'))
                    ->assertSessionHas('success', 'User successfully deleted.');
        expect($this->userService->findById($this->user->id))->toBeNull();
    });
});
