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
        Schema::table('properties', function (Blueprint $table) {
            $table->boolean('off_plan')->default(0)->after('bathroom');
            $table->boolean('new')->default(0)->after('off_plan');
            $table->unsignedBigInteger('visit_count')->default(0)->after('new');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn(['off_plan', 'new', 'visit_count']);
        });
    }
};
