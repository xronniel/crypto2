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
        Schema::create('property_photos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('property_id');
            $table->text('url');
            $table->boolean('watermark')->default(false);
            $table->timestamp('last_update')->nullable();
            $table->timestamps();

            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_photos');
    }
};
