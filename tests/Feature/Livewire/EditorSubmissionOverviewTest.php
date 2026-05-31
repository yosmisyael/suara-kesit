<?php

use App\Livewire\EditorSubmissionOverview;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(EditorSubmissionOverview::class)
        ->assertStatus(200);
});
