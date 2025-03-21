<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_image',
        'mobile_hero_image',
        'text_hero_banner',
        'calculator_title',
        'calculator_title2',
        'calculator_text',
        'buying_process_title',
        'buying_process_text',
        'requirements_title',
        'requirements_text',
        'requirements_step1',
        'requirements_step2',
        'requirements_step3',
        'requirements_step4',
        'requirements_icon1',
        'requirements_icon1_title',
        'requirements_icon1_text',
        'requirements_icon2',
        'requirements_icon2_title',
        'requirements_icon2_text',
        'requirements_icon3',
        'requirements_icon3_title',
        'requirements_icon3_text',
        'features_title',
        'features_card1_title',
        'features_card1_icon',
        'features_card1_text',
        'features_card2_title',
        'features_card2_icon',
        'features_card2_text',
        'features_card3_title',
        'features_card3_icon',
        'features_card3_text',
        'features_card4_title',
        'features_card4_icon',
        'features_card4_text',
        'app_coming_soon_title',
        'app_coming_soon_text',
        'facebook_link',
        'linkedin_link',
        'instagram_link',
        'tiktok_link',
    ];
}
