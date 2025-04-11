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
        Schema::create('holiday_property_amenity_pivot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('holiday_property_id');
            $table->unsignedBigInteger('amenity_id');
            $table->timestamps();
            $table->foreign('holiday_property_id')->references('id')->on('holiday_properties')->onDelete('cascade');
            $table->foreign('amenity_id')->references('id')->on('holiday_property_amenities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holiday_property_amenity_pivot');
    }
};
