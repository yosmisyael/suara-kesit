<?php

use App\Livewire\UserPostOverview;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(UserPostOverview::class)
        ->assertStatus(200);
});
