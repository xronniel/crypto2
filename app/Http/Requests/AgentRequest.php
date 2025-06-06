<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $agentId = $this->route('agent') ? $this->route('agent')->id : null;

        return [
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'required|string|max:255',
            'permit' => 'nullable|string|max:255',
            'email' => 'required|email|unique:agents,email,' . $agentId,
            'whatsapp' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'language' => 'nullable|string|max:255',
            'experience' => 'nullable|integer|min:0|max:100',
            'BRN' => 'nullable|string|max:50',
            'about' => 'nullable|string',
            'position' => 'nullable|string|max:255',
            'superagent' => 'nullable|boolean',
        ];

    }

    protected function prepareForValidation()
    {
        // Convert superagent checkbox to true/false
        if ($this->has('superagent')) {
            $this->merge(['superagent' => true]);
        } else {
            $this->merge(['superagent' => false]);
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'The agent name is required.',
            'email.required' => 'The email address is required.',
            'email.unique' => 'This email is already in use.',
            'phone.required' => 'The phone number is required.',
            'photo.image' => 'The photo must be an image.',
            'photo.mimes' => 'The photo must be a file of type: jpeg, png, jpg, gif.',
            'photo.max' => 'The photo size should not exceed 2MB.',
        ];
    }
}
