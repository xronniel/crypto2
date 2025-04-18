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
        Schema::create('aboutus', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title');
            $table->text('hero_text')->nullable();
            $table->string('image')->nullable();
        
            $table->string('wwo_section1_title1')->nullable();
            $table->text('wwo_section1_text1')->nullable();
            $table->string('wwo_section1_title2')->nullable();
            $table->text('wwo_section1_text2')->nullable();
        
            $table->string('wwo_section2_title1')->nullable();
            $table->text('wwo_section2_text1')->nullable();
            $table->string('wwo_section2_title2')->nullable();
            $table->text('wwo_section2_text2')->nullable();
            $table->string('wwo_section2_title3')->nullable();
            $table->text('wwo_section2_text3')->nullable();
        
            $table->string('wwo_section3_title1')->nullable();
            $table->text('wwo_section3_text1')->nullable();
            $table->string('wwo_section3_icon')->nullable();
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aboutus');
    }
};
