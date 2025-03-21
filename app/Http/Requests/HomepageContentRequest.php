<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomepageContentRequest extends FormRequest
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
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mobile_hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'text_hero_banner' => 'nullable|string|max:255',
            'calculator_title' => 'nullable|string|max:255',
            'calculator_title2' => 'nullable|string|max:255',
            'calculator_text' => 'nullable|string',
            'buying_process_title' => 'nullable|string|max:255',
            'buying_process_text' => 'nullable|string',
            'requirements_title' => 'nullable|string|max:255',
            'requirements_text' => 'nullable|string',
            'requirements_step1' => 'nullable|string|max:255',
            'requirements_step2' => 'nullable|string|max:255',
            'requirements_step3' => 'nullable|string|max:255',
            'requirements_step4' => 'nullable|string|max:255',
            'requirements_icon1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'requirements_icon1_title' => 'nullable|string|max:255',
            'requirements_icon1_text' => 'nullable|string',
            'requirements_icon2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'requirements_icon2_title' => 'nullable|string|max:255',
            'requirements_icon2_text' => 'nullable|string',
            'requirements_icon3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'requirements_icon3_title' => 'nullable|string|max:255',
            'requirements_icon3_text' => 'nullable|string',
            'features_title' => 'nullable|string|max:255',
            'features_card1_title' => 'nullable|string|max:255',
            'features_card1_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'features_card1_text' => 'nullable|string',
            'features_card2_title' => 'nullable|string|max:255',
            'features_card2_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'features_card2_text' => 'nullable|string',
            'features_card3_title' => 'nullable|string|max:255',
            'features_card3_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'features_card3_text' => 'nullable|string',
            'features_card4_title' => 'nullable|string|max:255',
            'features_card4_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'features_card4_text' => 'nullable|string',
            'app_coming_soon_title' => 'nullable|string|max:255',
            'app_coming_soon_text' => 'nullable|string',
            'facebook_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'tiktok_link' => 'nullable|url',
        ];
    }
}
