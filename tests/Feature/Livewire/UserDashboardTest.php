<?php

use App\Livewire\UserDashboard;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = User::factory()->create();
});

test('renders successfully', function () {
    Livewire::actingAs($this->user)
        ->test(UserDashboard::class)
        ->assertStatus(200);
});
