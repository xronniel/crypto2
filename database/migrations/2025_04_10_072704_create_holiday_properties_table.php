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
        Schema::create('holiday_properties', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number');
            $table->string('offering_type');
            $table->string('property_type');
            $table->boolean('price_on_application')->default(false);
            $table->decimal('price', 10, 2);
            $table->string('rental_period');
            $table->string('city');
            $table->string('community');
            $table->string('sub_community');
            $table->string('title_en');
            $table->text('description_en');
            $table->text('amenities');
            $table->integer('size');
            $table->integer('bedroom');
            $table->integer('bathroom');
            $table->integer('parking')->default(0);
            $table->string('agent_name');
            $table->string('agent_email');
            $table->string('agent_phone');
            $table->string('agent_photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holiday_properties');
    }
};
