<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Form;

class UserPersonalInfoForm extends Form
{
    public ?User $user = null;

    #[Rule('required|string|max:255')]
    public string $name = '';

    #[Rule('required|email|max:255')]
    public string $email = '';

    #[Rule('nullable|string|min:8')]
    public string $password = '';

    #[Rule('required|string|max:100')]
    public string $country = 'Indonesia';

    public function setUser(User $user): void
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function update(): void
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
        ];

        if (!empty($this->password)) {
            $data['password'] = bcrypt($this->password);
        }

        $this->user->update($data);

        $this->reset('password');
    }
}
