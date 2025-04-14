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
        Schema::create('holiday_property_amenity', function (Blueprint $table) {
            $table->id();
            $table->foreignId('holiday_property_id')->constrained()->onDelete('cascade');
            $table->foreignId('holiday_property_amenity_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holiday_property_amenity');
    }
};
