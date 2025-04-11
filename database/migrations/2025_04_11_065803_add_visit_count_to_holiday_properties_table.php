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
        Schema::table('holiday_properties', function (Blueprint $table) {
            $table->unsignedBigInteger('visit_count')->default(0)->after('new'); // Add visit_count column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('holiday_properties', function (Blueprint $table) {
            $table->dropColumn('visit_count'); // Remove visit_count column
        });
    }
};
