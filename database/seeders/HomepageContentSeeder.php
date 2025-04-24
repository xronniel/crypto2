<?php

namespace Database\Seeders;

use App\Models\HomepageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomepageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Delete existing data
        HomepageContent::truncate();
        HomepageContent::updateOrCreate(
            [
                'hero_image' => 'assets/img/bg/hero_image.jpg',
                'mobile_hero_image' => 'assets/img/bg/mobile_hero_image.jpg',
                'text_hero_banner' => 'Welcome to Your Dream Property Finder! (Sample – editable in admin portal)',
                'calculator_title' => 'Property Calculator (Sample)',
                'calculator_title2' => 'Estimate Your Budget (Sample)',
                'calculator_text' => 'This is a sample calculator description. Edit it anytime from the admin portal.',
                'buying_process_title' => 'How to Buy (Sample)',
                'buying_process_text' => 'This is a placeholder text for the buying process. Update it in admin.',
                'requirements_title' => 'Requirements (Sample)',
                'requirements_text' => 'This is sample content for requirements. You can change it in admin settings.',
                'requirements_step1' => null,
                'requirements_step2' => null,
                'requirements_step3' => null,
                'requirements_step4' => null,
                'requirements_icon1' => null,
                'requirements_icon1_title' => null,
                'requirements_icon1_text' => null,
                'requirements_icon2' => null,
                'requirements_icon2_title' => null,
                'requirements_icon2_text' => null,
                'requirements_icon3' => null,
                'requirements_icon3_title' => null,
                'requirements_icon3_text' => null,
                'features_title' => 'Platform Features (Sample)',
                'features_card1_title' => null,
                'features_card1_icon' => null,
                'features_card1_text' => null,
                'features_card2_title' => null,
                'features_card2_icon' => null,
                'features_card2_text' => null,
                'features_card3_title' => null,
                'features_card3_icon' => null,
                'features_card3_text' => null,
                'features_card4_title' => null,
                'features_card4_icon' => null,
                'features_card4_text' => null,
                'app_coming_soon_title' => 'App Coming Soon! (Sample)',
                'app_coming_soon_text' => 'This is a sample message. You can update it via the admin portal.',
                'facebook_link' => null,
                'linkedin_link' => null,
                'instagram_link' => null,
                'tiktok_link' => null,
            ]
        );
    }
}
