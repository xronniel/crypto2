<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $table = 'aboutus';

    protected $fillable = [
        'hero_title',
        'hero_text',
        'image',
        'wwo_section1_title1',
        'wwo_section1_text1',
        'wwo_section1_title2',
        'wwo_section1_text2',
        'wwo_section2_title1',
        'wwo_section2_text1',
        'wwo_section2_title2',
        'wwo_section2_text2',
        'wwo_section2_title3',
        'wwo_section2_text3',
        'wwo_section3_title1',
        'wwo_section3_text1',
        'wwo_section3_icon',
    ];
    
}
