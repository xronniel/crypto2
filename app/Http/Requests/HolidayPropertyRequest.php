<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HolidayPropertyRequest extends FormRequest
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
            'reference_number' => 'required|string|max:255',
            'offering_type' => 'required|string|max:255',
            'property_type' => 'required|string|max:255',
            'price_on_application' => 'nullable|boolean',
            'price' => 'nullable|numeric',
            'rental_period' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'community' => 'nullable|string|max:255',
            'sub_community' => 'nullable|string|max:255',
            'property_name' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'amenities' => 'nullable|string',
            'size' => 'nullable|numeric',
            'bedroom' => 'nullable|integer',
            'bathroom' => 'nullable|integer',
            'agent_id' => 'nullable|integer',
            'agent_name' => 'nullable|string|max:255',
            'agent_email' => 'nullable|email|max:255',
            'agent_phone' => 'nullable|string|max:255',
            'agent_license' => 'nullable|string|max:255',
            'agent_photo' => 'nullable|string|max:255',
            'parking' => 'nullable|integer',
            'furnished' => 'nullable|boolean',
            'photos' => 'nullable|array',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'last_update' => 'nullable|date',
        ];
    }
}
