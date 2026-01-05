<?php

use App\Livewire\UserDashboard;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(UserDashboard::class)
        ->assertStatus(200);
});
