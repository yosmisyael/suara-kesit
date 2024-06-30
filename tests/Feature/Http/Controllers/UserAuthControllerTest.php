<?php

use Database\Seeders\RolesAndPermissionSeeder;
use Database\Seeders\UserSeeder;

describe('UserAuthController', function () {
    beforeEach(function () {
        $this->seed(RolesAndPermissionSeeder::class);
    });

    it('should be able to access user registration page', function () {
        $this->get(route('user.auth.register'))
            ->assertOk()
            ->assertViewIs('pages.user.register');
    });

    it('should be able to register user', function () {
        $this->post(route('user.auth.register'), [
            'username' => 'beta',
            'name' => 'beta',
            'email' => 'beta@example.com',
            'password' => 'P@assw0rd',
            'password_confirmation' => 'P@assw0rd',
        ])
            ->assertRedirect(route('user.auth.login'))
            ->assertSessionHas('success', 'You have successfully registered. Now please login with your new account.');
    });

    it('should not be able to register when username is empty', function () {
        $this->post(route('user.auth.register'), [
            'name' => 'beta',
            'email' => 'beta@example.com',
            'password' => 'P@assw0rd',
            'password_confirmation' => 'P@assw0rd',
        ])
            ->assertSessionHasErrors(['username' => 'The username field is required.']);
    });

    it('should not be able to register when username is invalid', function () {
        $this->post(route('user.auth.register'), [
            'username' => 'beta beta',
            'name' => 'beta',
            'email' => 'beta@example.com',
            'password' => 'P@assw0rd',
            'password_confirmation' => 'P@assw0rd',
        ])
            ->assertSessionHasErrors(['username' => 'The username field must only contain letters, numbers, dashes, and underscores.']);
    });

    it('should not be able to register when username is already used', function () {
        $this->seed(UserSeeder::class);
        $this->post(route('user.auth.register'), [
            'username' => 'alpha',
            'name' => 'beta',
            'email' => 'beta@example.com',
            'password' => 'P@assw0rd',
            'password_confirmation' => 'P@assw0rd',
        ])
            ->assertSessionHasErrors(['username' => 'The username has already been taken.']);
    });

    it('should not be able to register when name is empty', function () {
        $this->post(route('user.auth.register'), [
            'username' => 'beta',
            'email' => 'beta@example.com',
            'password' => 'P@assw0rd',
            'password_confirmation' => 'P@assw0rd',
        ])
            ->assertSessionHasErrors(['name' => 'The name field is required.']);
    });

    it('should not be able to register when email is empty', function () {
        $this->post(route('user.auth.register'), [
            'username' => 'beta',
            'name' => 'beta',
            'password' => 'P@assw0rd',
            'password_confirmation' => 'P@assw0rd',
        ])
            ->assertSessionHasErrors(['email' => 'The email field is required.']);
    });

    it('should not be able to register when email is already used', function () {
        $this->seed(UserSeeder::class);
        $this->post(route('user.auth.register'), [
            'username' => 'beta',
            'name' => 'beta',
            'email' => 'alpha@test.com',
            'password' => 'P@assw0rd',
            'password_confirmation' => 'P@assw0rd',
        ])
            ->assertSessionHasErrors(['email' => 'The email has already been taken.']);
    });

    it('should not be able to register when email is invalid', function () {
        $this->seed(UserSeeder::class);
        $this->post(route('user.auth.register'), [
            'username' => 'beta',
            'name' => 'beta',
            'email' => 'beta',
            'password' => 'P@assw0rd',
            'password_confirmation' => 'P@assw0rd',
        ])
            ->assertSessionHasErrors(['email' => 'The email field must be a valid email address.']);
    });

    it('should not be able to create user when password is empty', function () {
        $this->post(route('user.auth.register'), [
            'username' => 'beta',
            'email' => 'beta@example.com',
            'password_confirmation' => '0987123#',
            'name' => 'beta',
        ])
            ->assertSessionHasErrors(['password' => 'The password field is required.']);
    });

    it('should not be able to create user when password not meet requirements (letter)', function () {
        $this->post(route('user.auth.register'), [
                'username' => 'beta',
                'email' => 'beta@example.com',
                'password' => '0987123#',
                'password_confirmation' => '0987123#',
                'name' => 'beta',
            ])
            ->assertSessionHasErrors(['password' => 'The password field must contain at least one letter.']);
    });

    it('should not be able to create user when password not meet requirements (mixed case)', function () {
        $this->post(route('user.auth.register'), [
                'username' => 'beta',
                'email' => 'beta@example.com',
                'password' => 'p@ssw0rd',
                'password_confirmation' => 'p@ssw0rd',
                'name' => 'beta',
            ])
            ->assertSessionHasErrors(['password' => 'The password field must contain at least one uppercase and one lowercase letter.']);
    });

    it('should not be able to create user when password not meet requirements (symbol)', function () {
        $this->post(route('user.auth.register'), [
                'username' => 'beta',
                'email' => 'beta@example.com',
                'password' => 'Passw0rd',
                'password_confirmation' => 'Passw0rd',
                'name' => 'beta',
            ])
            ->assertSessionHasErrors(['password' => 'The password field must contain at least one symbol.']);
    });

    it('should not be able to create user when password not meet requirements (number)', function () {
        $this->post(route('user.auth.register'), [
                'username' => 'beta',
                'email' => 'beta@example.com',
                'password' => 'Password',
                'password_confirmation' => 'Password',
                'name' => 'beta',
            ])
            ->assertSessionHasErrors(['password' => 'The password field must contain at least one symbol.']);
    });

    it('should not be able to create user when password confirmation is empty', function () {
        $this->post(route('user.auth.register'), [
            'username' => 'beta',
            'email' => 'beta@example.com',
            'password' => 'P@assw0rd',
            'name' => 'beta',
        ])
            ->assertSessionHasErrors(['password_confirmation' => 'The password confirmation field is required.']);
    });

    it('should not be able to create user when password confirmation is not match with password field', function () {
        $this->post(route('user.auth.register'), [
            'username' => 'beta',
            'email' => 'beta@example.com',
            'password' => 'P@assw0rd',
            'password_confirmation' => 'Password',
            'name' => 'beta',
        ])
            ->assertSessionHasErrors(['password_confirmation' => 'The password confirmation field must match password.']);
    });
});

