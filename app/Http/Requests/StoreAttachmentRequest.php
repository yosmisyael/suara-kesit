<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAttachmentRequest extends FormRequest
{
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
        return [
            'batch_id' => 'required_without:post_id|nullable|uuid',
            'post_id' => 'required_without:batch_id|nullable|integer|exists:posts,id',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:4096',
        ];
    }

    public function messages(): array
    {
        return [
            'image.image' => 'Only image upload allowed.',
            'image.max' => 'The image is too large. Please upload an image smaller than 4MB.',
            'image.mimes' => 'Only JPG, PNG, and WEBP formats are supported.',
        ];
    }
}
