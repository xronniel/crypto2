<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
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
            'country_name' => 'required|string|max:255',
            'country_image' => 'required|string|max:255', 
            'reviewer_details' => 'required|string|max:255',
            'review' => 'required|string',
            'active' => 'required|boolean',
        ];
    }
}
