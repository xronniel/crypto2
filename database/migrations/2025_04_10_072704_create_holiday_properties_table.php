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
            $table->string('reference_number')->unique();
            $table->string('offering_type');
            $table->string('property_type');
            $table->boolean('price_on_application')->default(false);
            $table->decimal('price', 12, 2)->nullable();
            $table->string('rental_period');
            $table->string('city');
            $table->string('community');
            $table->string('sub_community')->nullable();
            $table->string('property_name')->nullable();
            $table->string('title_en');
            $table->text('description_en');
            $table->text('amenities')->nullable();
            $table->decimal('size', 10, 2)->nullable();
            $table->integer('bedroom');
            $table->integer('bathroom');
            $table->foreignId('agent_id')->nullable()->constrained()->onDelete('set null');
            $table->string('agent_name');
            $table->string('agent_email');
            $table->string('agent_phone');
            $table->string('agent_license')->nullable();
            $table->string('agent_photo')->nullable();
            $table->integer('parking')->default(0);
            $table->boolean('furnished')->default(false);
            $table->text('photos')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamp('last_update')->nullable();
            $table->boolean('xml')->default(true);
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
