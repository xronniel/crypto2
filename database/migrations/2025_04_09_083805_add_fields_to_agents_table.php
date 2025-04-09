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
        Schema::table('agents', function (Blueprint $table) {
            $table->string('address')->nullable();
            $table->string('nationality')->nullable();
            $table->string('language')->nullable(); // Use JSON if storing multiple languages
            $table->integer('experience')->nullable(); // Years of experience
            $table->string('BRN')->nullable(); // Broker Registration Number
            $table->text('about')->nullable();
            $table->string('position')->nullable();
            $table->boolean('superagent')->default(0); // Assuming you want to keep the photo field
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agents', function (Blueprint $table) {
            $table->dropColumn([
                'address',
                'nationality',
                'language',
                'experience',
                'BRN',
                'about',
                'position',
                'superagent'
            ]);
        });
    }
};
