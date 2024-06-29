<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRegisterRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'username' => Str::trim($this->request->get('username')),
            'email' => Str::lower($this->request->get('email')),
            'name' => Str::title($this->request->get('name')),
        ]);
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $route = $this->route()->getName();

        $rules = [
            'username' => ['required', 'string', 'alpha_dash:ascii', 'max:100', 'unique:users,username'],
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'max:100', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'max:100', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
        ];

        if ($route === 'admin.user.store') {
            $rules['role'] = ['required', 'string', 'max:100', Rule::in(['member', 'author'])];
        }

        if ($route === 'user.auth.store') {
            $rules['password_confirmation'] = ['required', 'same:password'];
        }

        return $rules;
    }
}
