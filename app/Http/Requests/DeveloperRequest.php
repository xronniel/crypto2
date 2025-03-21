<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeveloperRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $developerId = $this->route('developer') ? $this->route('developer')->id : null;

        return [
            'name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    /**
     * Custom error messages.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The developer name is required.',
            'img.image' => 'The image must be a valid image file.',
            'img.mimes' => 'The image must be of type: jpeg, png, jpg, or gif.',
            'img.max' => 'The image size should not exceed 2MB.',
        ];
    }
}
