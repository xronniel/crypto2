<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        $rules = [
            'title' => 'required|string|max:255',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'date' => 'required|date',
            'time' => 'required',
            'content' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg',
            'mobile_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg',
        ];

        // If it's a create request, make the thumbnail required
        if ($this->isMethod('post')) {
            $rules['thumbnail'] = 'required|image|mimes:jpeg,png,jpg';
        }

        return $rules;
    }
}
