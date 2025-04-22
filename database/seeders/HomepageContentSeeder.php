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
        HomepageContent::create([
            'hero_image' => 'assets/img/bg/hero_image.jpg', // Default hero image path
            'mobile_hero_image' => 'assets/img/bg/mobile_hero_image.jpg', // Default mobile hero image path
            'text_hero_banner' => null,
            'calculator_title' => null,
            'calculator_title2' => null,
            'calculator_text' => null,
            'buying_process_title' => null,
            'buying_process_text' => null,
            'requirements_title' => null,
            'requirements_text' => null,
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
            'features_title' => null,
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
            'app_coming_soon_title' => null,
            'app_coming_soon_text' => null,
            'facebook_link' => null,
            'linkedin_link' => null,
            'instagram_link' => null,
            'tiktok_link' => null,
        ]);
    }
}
