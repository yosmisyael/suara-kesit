<?php

use App\Livewire\UserSettings;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(UserSettings::class)
        ->assertStatus(200);
});
