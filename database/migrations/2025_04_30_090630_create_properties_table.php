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
        Schema::create('properties', function (Blueprint $table) {
            $table->bigInteger('id')->primary(); // from XML attribute
            $table->string('reference_number');
            $table->string('permit_number');
            $table->decimal('price', 15, 2);
            $table->string('offering_type');
            $table->string('property_type');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('city');
            $table->string('community')->nullable();
            $table->string('sub_community')->nullable();
            $table->string('property_name')->nullable();
            $table->string('title_en')->nullable();
            $table->text('description_en')->nullable();
            $table->integer('size')->nullable();
            $table->integer('bedroom')->nullable();
            $table->integer('bathroom')->nullable();
            $table->boolean('price_on_application')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_exclusive')->default(false);
            $table->timestamp('last_update')->nullable();
            $table->timestamps();

            $table->foreignId('agent_id')->constrained('agents')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
