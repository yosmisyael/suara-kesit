<?php

namespace App\Livewire;

use App\Helper\CountryHelper;
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
        $this->subscription = !is_null($user->newsletter_subscribed_at);
    }

    public function save(): void
    {
        $this->form->update();

        $this->dispatch('notify', message: 'Your information has been updated.');
    }

    public function toggleSubscription(): void
    {
        $user = auth()->user();
        if ($user->newsletter_subscribed_at) {
            $user->update(['newsletter_subscribed_at' => null]);
            $this->subscription = false;
            $this->dispatch('notify',
                message: 'Your unsubscribed to our newsletter.',
                type: 'success'
            );
        } else {
            $user->update(['newsletter_subscribed_at' => now()]);
            $this->subscription = true;
            $this->dispatch('notify',
                message: 'Your subscribed to our newsletter.',
                type: 'success'
            );
        }
    }

    #[Layout('components.layouts.user')]
    public function render(): View
    {
        $user = auth()->user();
        return view('livewire.user.settings', [
            'countries' => CountryHelper::all(),
        ])->layout('components.layouts.user', ['user' => $user]);
    }
}
