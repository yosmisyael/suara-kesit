<?php

use App\Models\User;

test('login page can be rendered', function () {
    $response = $this->get(route('public.login'));
    $response->assertStatus(200)
        ->assertViewIs('pages.auth.login');
});

test('users can authenticate using the login page', function () {
    $user = User::factory()->withoutTwoFactor()->create();

    $response = $this->post(route('public.login'), [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('user.dashboard', absolute: false));

    $this->assertAuthenticated();
});

test('users can not authenticate with invalid credentials', function ($badData, $expectedErrorField) {
    $user = User::factory()->create();

    $data = array_merge([
        'email' => $user->email,
        'password' => 'password',
    ], $badData);

    $response = $this->post(route('public.login.handle'), $data);

    $response->assertSessionHasErrors($expectedErrorField);

    $this->assertGuest();
})->with([
    'empty email' => [[ 'email' => '' ], 'email'],
    'invalid email' => [[ 'email' => 'invalid' ], 'email'],
    'empty password' => [[ 'password' => '' ], 'password'],
    'false email' => [[ 'email' => 'test@test.com' ], 'auth'],
    'invalid password' => [[ 'password' => 'invalid' ], 'auth'],
]);

test('users can logout', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->delete(route('user.logout'));

    $response->assertRedirect(route('public.login'));

    $this->assertGuest();
});
