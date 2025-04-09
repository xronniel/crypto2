<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
        return [
            'commentable_id' => 'required|integer',
            'commentable_type' => 'required|in:App\\Models\\News,App\\Models\\Article',
            'parent_id' => 'nullable|integer|exists:comments,id',
            'content' => 'required|string|max:1000',
            'name' => 'required|string|max:255'
        ];
    }
}
