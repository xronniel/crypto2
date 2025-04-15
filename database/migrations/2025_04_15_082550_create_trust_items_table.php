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
        Schema::create('trust_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mortgage_landing_page_id')->constrained()->onDelete('cascade');
            $table->string('icon')->nullable(); // path or class name (fontawesome, svg, etc.)
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trust_items');
    }
};
