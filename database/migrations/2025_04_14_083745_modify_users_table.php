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
    // Step 1: Rename the column
    Schema::table('users', function (Blueprint $table) {
        $table->renameColumn('name', 'first_name');
    });

    // Step 2: Add new columns
    Schema::table('users', function (Blueprint $table) {
        $table->string('last_name')->nullable()->after('first_name');
        $table->string('country_code', 10)->nullable()->after('email');
        $table->string('mobile_number')->nullable()->after('country_code');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Step 1: Drop the newly added columns
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('last_name');
            $table->dropColumn('country_code');
            $table->dropColumn('mobile_number');
        });

        // Step 2: Rename 'first_name' back to 'name'
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('first_name', 'name');
        });
    }
};
