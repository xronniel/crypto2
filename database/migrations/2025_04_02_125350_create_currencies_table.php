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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Currency name (e.g., US Dollar)
            $table->string('code')->unique(); // Currency code (e.g., USD, EUR, BTC)
            $table->decimal('rate', 25, 10); // Exchange rate (compared to base currency)
            $table->enum('type', ['fiat', 'crypto'])->default('fiat'); // Fiat or Crypto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
