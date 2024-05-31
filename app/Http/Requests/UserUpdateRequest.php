<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserUpdateRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        if ($this->username) $this->merge([
            'username' => Str::lower($this->username)]);
        if ($this->email) $this->merge([
            'email' => Str::lower($this->email)]);
        if ($this->name) $this->merge([
            'name' => Str::title($this->name)]);
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if ($method === 'PATCH')
            return [
                'id' => ['required', 'exists:users,id', 'uuid'],
                'password' => [
                    'required', 'string', 'confirmed', Password::min(8)->max(100)->letters()->mixedCase()->numbers()->symbols()
                ],
                'password_confirmation' => ['required', 'string', 'min:8', 'same:password'],
            ];

        return [
            'id' => ['required', 'exists:users,id', 'uuid'],
            'name' => ['string', 'max:100'],
            'email' =>  ['string', 'max:100', 'email'],
            'username' => [
                'string', 'alpha_dash:ascii', 'max:100', Rule::unique('users', 'username')->ignore($this->id)
            ],
            'role' => ['string', 'max:100', Rule::in(['member', 'author'])],
        ];
    }
}
