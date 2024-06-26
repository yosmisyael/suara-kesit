<?php

use App\DTO\UserDTO;
use App\Models\User;
use App\Services\UserService;
use Database\Seeders\RolesAndPermissionSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Collection;

describe('UserService', function() {
    beforeEach(function () {
        $this->userService = app()->make(UserService::class);
        $this->seed([RolesAndPermissionSeeder::class, UserSeeder::class]);
    });

    it('should be able to create user', function () {
        expect($this->userService->create(new UserDTO([
            'username' => 'beta',
            'name' =>'beta',
            'email' => 'beta@test.com',
            'password' => 'password',
            'role' => 'member'
        ])))->toBeTrue();
    });

    it('should be able to create user without specify role', function () {
        expect($this->userService->create(new UserDTO([
            'username' => 'beta',
            'name' => 'beta',
            'email' => 'beta@test.com',
            'password' => 'password',
        ])))->toBeTrue()
            ->and(User::with('roles')->where('username', '=', 'beta')
                ->getRelation('roles')->first()->name)
            ->toBe('member');

    });

    it('should be able to find user by username', function () {
        $result = $this->userService->findByUsername('alpha');
        expect($result)->toBeObject()
            ->and($result->username)->toBe('alpha');
    });

    it('should be able to update user', function () {
        $user = $this->userService->findByUsername('alpha');
        $result = $this->userService->update($user->id, [
            'username' => 'new',
            'name' => 'new',
        ]);
        expect($result)->toBeTrue()
            ->and($this->userService->findByUsername('new')->username)->toBe('new');
    });

    it('should be able to delete user', function () {
        $user = $this->userService->findByUsername('alpha');
        expect($this->userService->delete($user->id))->toBeTrue()
            ->and($this->userService->findByUsername('alpha'))->toBeNull();
    });

    it('should be able to get all user', function () {
        User::factory()->count(5)->create();
        expect($this->userService->all())->toBeInstanceOf(Collection::class)
            ->and($this->userService->all()->count())->toBe(7);
    });

    it('should be able to get users based on their role', function () {
        expect($this->userService->getByRole('author'))->toBeInstanceOf(Collection::class)
            ->and($this->userService->getByRole('author')->count())->toBe(1)
                ->and($this->userService->getByRole('member')->count())->toBe(1);
    });
});
