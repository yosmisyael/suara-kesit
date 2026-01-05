<?php

namespace App\Livewire;

use App\Livewire\Forms\UserPersonalInfoForm;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class UserSettings extends Component
{
    public UserPersonalInfoForm $form;

    public bool $subscription = false;

    public function mount(): void
    {
        $user = auth()->user();
        $this->form->setUser($user);
    }

    #[Layout('components.layouts.user')]
    public function render(): View
    {
        $user = auth()->user();
        return view('livewire.user.settings')
            ->layout('components.layouts.user', ['user' => $user]);
    }

    public function save(): void
    {
        $this->form->update();

        $this->dispatch('notify', message: 'Your information has been updated.');
    }

    public function toggleSubscription(): void
    {
        $user = auth()->user();
        // TODO: implement db subscription toggle
        $this->subscription = !$this->subscription;
    }
}
