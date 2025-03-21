<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('homepage_contents', function (Blueprint $table) {
            $table->id();
            $table->string('hero_image')->nullable();
            $table->string('mobile_hero_image')->nullable();
            $table->string('text_hero_banner')->nullable();
            $table->string('calculator_title')->nullable();
            $table->string('calculator_title2')->nullable();
            $table->text('calculator_text')->nullable();
            $table->string('buying_process_title')->nullable();
            $table->text('buying_process_text')->nullable();
            $table->string('requirements_title')->nullable();
            $table->text('requirements_text')->nullable();
            $table->string('requirements_step1')->nullable();
            $table->string('requirements_step2')->nullable();
            $table->string('requirements_step3')->nullable();
            $table->string('requirements_step4')->nullable();
            $table->string('requirements_icon1')->nullable();
            $table->string('requirements_icon1_title')->nullable();
            $table->text('requirements_icon1_text')->nullable();
            $table->string('requirements_icon2')->nullable();
            $table->string('requirements_icon2_title')->nullable();
            $table->text('requirements_icon2_text')->nullable();
            $table->string('requirements_icon3')->nullable();
            $table->string('requirements_icon3_title')->nullable();
            $table->text('requirements_icon3_text')->nullable();
            $table->string('features_title')->nullable();
            $table->string('features_card1_title')->nullable();
            $table->string('features_card1_icon')->nullable();
            $table->text('features_card1_text')->nullable();
            $table->string('features_card2_title')->nullable();
            $table->string('features_card2_icon')->nullable();
            $table->text('features_card2_text')->nullable();
            $table->string('features_card3_title')->nullable();
            $table->string('features_card3_icon')->nullable();
            $table->text('features_card3_text')->nullable();
            $table->string('features_card4_title')->nullable();
            $table->string('features_card4_icon')->nullable();
            $table->text('features_card4_text')->nullable();
            $table->string('app_coming_soon_title')->nullable();
            $table->text('app_coming_soon_text')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('tiktok_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_contents');
    }
};
