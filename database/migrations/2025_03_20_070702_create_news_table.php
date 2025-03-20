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
        // Create the news table
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail'); 
            $table->string('mobile_thumbnail')->nullable(); 
            $table->string('title'); 
            $table->string('state'); 
            $table->string('country');
            $table->date('date'); 
            $table->time('time');
            $table->longText('content'); 
            $table->timestamps();
        });

        // Create the news_galleries table for gallery images
        Schema::create('news_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_id')->constrained()->onDelete('cascade');
            $table->string('image_path'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_galleries');
        Schema::dropIfExists('news');
    }
};
