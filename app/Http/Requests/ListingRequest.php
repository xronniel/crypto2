<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListingRequest extends FormRequest
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
            'agent_id' => 'nullable|exists:agents,id',
            'community_id' => 'nullable|exists:communities,id',
            'property_title' => 'required|string|max:255',
            'ad_type' => 'required|string|max:255',
            'community' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'listing_agent' => 'nullable|string|max:255',
            'listing_agent_phone' => 'nullable|string|max:255',
            'listing_agent_email' => 'nullable|email|max:255',
            'listing_agent_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'property_ref_no' => 'required|string|max:255',
            'property_name' => 'required|string|max:255',
            'unit_type' => 'nullable|string|max:255',
            'unit_model' => 'nullable|string|max:255',
            'primary_view' => 'nullable|string|max:255',
            'unit_builtup_area' => 'nullable|numeric|min:0',
            'unit_reference_no' => 'nullable|string|max:255',
            'plot_area' => 'nullable|numeric|min:0',
            'no_of_bathroom' => 'nullable|integer|min:0',
            'no_of_rooms' => 'nullable|integer|min:0',
            'bedrooms' => 'required|integer|min:0',
            'latitude' => 'nullable|string|max:255',
            'longitude' => 'nullable|string|max:255',
            'emirate' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'permit_number' => 'nullable|string|max:255',
            'completion_status' => 'required|string|max:255',
            'listing_date' => 'nullable|date',
            'web_remarks' => 'nullable|string',
            'description' => 'nullable|string',
            'brochure' => 'nullable|mimes:pdf,jpeg,png,jpg,gif,svg',
            'floor_plan' => 'nullable|mimes:pdf,jpeg,png,jpg,gif,svg',
            'cheques' => 'nullable|integer',
            'parking' => 'nullable|integer|min:0',
            'unit_measure' => 'nullable|string|max:255',
            'listing_agent_permit' => 'nullable|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'facilities' => 'nullable|array',
            'facilities.*' => 'exists:facilities,id',
            'available_from' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'new' => 'nullable|boolean',
            'verified' => 'nullable|boolean',
            'superagent' => 'nullable|boolean',
            'listing_agent_whatsapp' => 'nullable|string|max:255',
            'type' => 'nullable|in:NA,Residential,Commercial,Holiday,Mortgages',
            'developer_id' => 'nullable|exists:developers,id',
            'district_id' => 'nullable|exists:districts,id',
            'exclusive' => 'boolean',
            'featured' => 'boolean',
            'fitted' => 'nullable|string|max:255',
            'web_tour' => 'nullable|string|max:255',
            'threesixty_tour' => 'nullable|string|max:255',
            'virtual_tour' => 'nullable|string|max:255',
            'qr_code' => 'nullable|string|max:255',
            'preview_link' => 'nullable|string|max:255',
            'strno' => 'nullable|string|max:255',
            'price_on_application' => 'boolean',
            'off_plan' => 'boolean',
            'last_updated' => 'nullable|date',
        ];
    
        // Add conditional validation for developer_id when off_plan is 1
        if ($this->input('off_plan') == 1) {
            $rules['developer_id'] = 'required|exists:developers,id';
        }
    
        return $rules;
    }
}
