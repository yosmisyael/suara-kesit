<?php

use App\Models\User;
use Database\Seeders\RolePermissionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\{get, post, assertDatabaseHas};

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed(RolePermissionSeeder::class);
});

test('registration page can be rendered', function () {
    get(route('public.signup'))
        ->assertOk()
        ->assertViewIs('pages.auth.register');
});

test('new user can register with valid data', function () {
    $formData = [
        'name' => 'Test User',
        'email' => 'test@test.com',
        'password' => 'test1234',
        'confirm_password' => 'test1234',
    ];

    post(route('public.signup.handle'), $formData)
        ->assertRedirect(route('public.login'))
        ->assertSessionHas('success');

    assertDatabaseHas('users', [
        'email' => 'test@test.com',
        'name' => 'Test User',
    ]);

    $user = User::query()->where('email', 'test@test.com')->first();

    expect($user->hasRole('member'))
        ->toBeTrue('The user was created but the "member" role was not assigned.');
});

test('registration fails validation rules', function ($badData, $expectedErrorField) {
    // merge bad data with valid defaults to break one thing at a time
    $data = array_merge([
        'name' => 'Valid Name',
        'email' => 'valid@email.com',
        'password' => 'password123',
        'confirm_password' => 'password123',
    ], $badData);

    post(route('public.signup.handle'), $data)
        ->assertSessionHasErrors($expectedErrorField);

})->with([
    'empty name' => [['name' => ''], 'name'],
    'invalid email' => [['email' => 'not-an-email'], 'email'],
    'short password' => [['password' => 'short'], 'password'],
    'password mismatch' => [['password' => '12345678', 'confirm_password' => '87654321'], 'confirm_password'],
]);

test('cannot register with duplicate email', function () {
    User::factory()->create(['email' => 'taken@example.com']);

    $formData = [
        'name' => 'New Guy',
        'email' => 'taken@example.com',
        'password' => 'password123',
        'confirm_password' => 'password123',
    ];

    post(route('public.signup.handle'), $formData)
        ->assertSessionHasErrors(['email']);
});
