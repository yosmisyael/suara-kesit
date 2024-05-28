<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRegisterRequest extends FormRequest
{
    protected function prepareForValidation(): void {
        $this->merge([
            'username' => Str::lower($this->username),
            'email' => Str::lower($this->email),
            'name' => Str::title($this->name),
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'alpha_dash:ascii', 'max:100', 'unique:users,username'],
            'name' => ['required', 'string', 'max:100'],
            'email' =>  ['required', 'string', 'max:100', 'email', 'unique:users,email'],
            'password' =>  ['required', 'string', 'max:100', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            'role' => ['required', 'string', 'max:100', Rule::in(['member', 'author'])],
        ];
    }
}
