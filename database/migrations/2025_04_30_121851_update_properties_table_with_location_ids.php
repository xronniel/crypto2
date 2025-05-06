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
            // Drop old columns
            $table->dropColumn(['city', 'community', 'sub_community']);

            // Add new foreign key columns
            $table->foreignId('emirate_id')->nullable()->constrained()->onDelete('set null')->after('agent_id');
            $table->foreignId('community_id')->nullable()->constrained()->onDelete('set null')->after('emirate_id');
            $table->foreignId('sub_community_id')->nullable()->constrained()->onDelete('set null')->after('community_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropForeign(['emirate_id']);
            $table->dropForeign(['community_id']);
            $table->dropForeign(['sub_community_id']);

            $table->dropColumn(['emirate_id', 'community_id', 'sub_community_id']);

            $table->string('city')->nullable();
            $table->string('community')->nullable();
            $table->string('sub_community')->nullable();
        });
    }
};
