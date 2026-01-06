<?php

namespace App\Livewire\Forms;

use App\Helper\CountryHelper;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Illuminate\Validation\Rule as ValidationRule;

class UserPersonalInfoForm extends Form
{
    public ?User $user = null;
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $country = '';

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user->id,
            'password' => 'nullable|string|min:8',
            'country' => [
                'nullable',
                'size:2',
                'string',
                ValidationRule::in(CountryHelper::getCode()),
            ],
        ];
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->country = $user->country ?? '';
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

        if (!empty($this->country)) {
            $data['country'] = $this->country;
        }

        $this->user->update($data);

        $this->reset('password');

        $this->component->dispatch('notify',
            message: 'Your profile has been updated.',
            type: 'success',
        );
    }
}
