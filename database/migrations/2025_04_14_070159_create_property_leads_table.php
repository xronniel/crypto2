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
        Schema::create('property_leads', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->text('message')->nullable();
            $table->string('source_page')->nullable();
            $table->string('property_ref_no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_leads');
    }
};
