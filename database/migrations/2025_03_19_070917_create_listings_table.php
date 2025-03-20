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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('ad_type');
            $table->string('unit_type');
            $table->string('unit_model')->nullable();
            $table->string('primary_view')->nullable();
            $table->decimal('unit_builtup_area', 10, 2);
            $table->integer('no_of_bathroom');
            $table->string('property_title');
            $table->text('web_remarks')->nullable();
            $table->string('emirate');
            $table->string('community');
            $table->boolean('exclusive')->default(false);
            $table->integer('cheques')->default(0);
            $table->decimal('plot_area', 15, 2)->default(0);
            $table->string('property_name');
            $table->string('property_ref_no');
            $table->string('listing_agent');
            $table->string('listing_agent_phone');
            $table->string('listing_agent_photo')->nullable();
            $table->string('listing_agent_permit');
            $table->timestamp('listing_date')->nullable();
            $table->timestamp('last_updated')->nullable();
            $table->string('bedrooms');
            $table->string('listing_agent_email');
            $table->decimal('price', 12, 2);
            $table->string('unit_reference_no');
            $table->string('no_of_rooms');
            $table->decimal('latitude', 10, 6);
            $table->decimal('longitude', 10, 6);
            $table->string('unit_measure');
            $table->boolean('featured')->default(false);
            $table->string('fitted')->nullable();
            $table->string('company_name');
            $table->string('web_tour')->nullable();
            $table->string('threesixty_tour')->nullable();
            $table->string('virtual_tour')->nullable();
            $table->string('qr_code')->nullable();
            $table->string('company_logo')->nullable();
            $table->integer('parking')->default(0);
            $table->string('preview_link')->nullable();
            $table->string('strno')->nullable();
            $table->boolean('price_on_application')->default(false);
            $table->boolean('off_plan')->default(false);
            $table->string('permit_number');
            $table->string('completion_status');
            $table->timestamps();
        });

        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('listing_facility', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained('listings')->onDelete('cascade');
            $table->foreignId('facility_id')->constrained('facilities')->onDelete('cascade');
        });

        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained('listings')->onDelete('cascade');
            $table->string('url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
        Schema::dropIfExists('listing_facility');
        Schema::dropIfExists('facilities');
        Schema::dropIfExists('listings');
    }
};
