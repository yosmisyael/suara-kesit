<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class UserDashboard extends Component
{
    public function render(): View
    {
        $user = auth()->user();
        return view('livewire.user.dashboard', [
            'user' => $user
        ])
            ->layout('components.layouts.user', [
                'title' => 'User Dashboard',
                'user' => $user,
            ]);
    }
}
