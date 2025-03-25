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
        Schema::create('articles', function (Blueprint $table) {
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

        Schema::create('article_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->constrained()->onDelete('cascade');
            $table->string('image_path'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
        Schema::dropIfExists('article_galleries');
    }
};
