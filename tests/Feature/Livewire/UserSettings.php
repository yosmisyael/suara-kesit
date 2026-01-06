<?php

use App\Livewire\UserSettings;
use App\Models\User;
use Livewire\Livewire;

test('renders successfully and pre-fills user data', function () {
    $user = User::factory()->create([
        'name' => 'Old Name',
        'email' => 'old@example.com',
        'newsletter_subscribed_at' => null,
    ]);

    Livewire::actingAs($user)
        ->test(UserSettings::class)
        ->assertStatus(200)
        ->assertSet('form.name', 'Old Name')
        ->assertSet('form.email', 'old@example.com')
        ->assertSet('subscription', false);
});

test('redirects guests to login', function () {
    $response = $this->get(route('user.settings'));
    $response->assertStatus(302)
        ->assertRedirect(route('public.login'));
});

test('user can udpate their profile', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(UserSettings::class)
        ->set('form.name', 'New Name')
        ->set('form.email', 'new@email.com')
        ->set('form.country', 'ID')
        ->call('save')
        ->assertHasNoErrors()
        ->assertDispatched('notify');

    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'name' => 'New Name',
        'email' => 'new@email.com',
        'country' => 'ID',
    ]);
});

test('user can update password when provided', function () {
    $user = User::factory()->create([
        'password' => bcrypt('password'),
    ]);

    Livewire::actingAs($user)
        ->test(UserSettings::class)
        ->set('form.password', '')
        ->call('save')
        ->assertHasNoErrors()
        ->assertDispatched('notify');

    $this->assertTrue(Hash::check('password', $user->fresh()->password));

    Livewire::actingAs($user)
        ->test(UserSettings::class)
        ->set('form.password', 'test1234')
        ->call('save')
        ->assertHasNoErrors()
        ->assertDispatched('notify');

    $this->assertTrue(Hash::check('test1234', $user->fresh()->password));
});

test('profile information is validated', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(UserSettings::class)
        ->set('form.name', '')
        ->set('form.email', 'not-an-email')
        ->call('save')
        ->assertHasErrors([
            'form.name' => 'required',
            'form.email' => 'email',
        ]);
});

test('user can toggle newsletter subscription', function () {
    $user = User::factory()->create();

    $component = Livewire::actingAs($user)
        ->test(UserSettings::class)
        ->assertSet('subscription', false);

    $component->call('toggleSubscription')
        ->assertSet('subscription', true)
        ->assertDispatched('notify', type: 'success');

    expect($user->fresh()->newsletter_subscribed_at)->not->toBeNull();

    $component->call('toggleSubscription')
        ->assertSet('subscription', false)
        ->assertDispatched('notify', type: 'success');

    expect($user->fresh()->newsletter_subscribed_at)->toBeNull();
});
