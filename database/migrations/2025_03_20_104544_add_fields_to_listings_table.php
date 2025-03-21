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
        Schema::table('listings', function (Blueprint $table) {
            $table->date('available_from')->nullable()->after('completion_status');
            $table->text('description')->nullable()->after('available_from');
            $table->string('location')->nullable()->after('description');
            $table->string('brochure')->nullable()->after('location');
            $table->boolean('new')->default(false)->after('brochure');
            $table->boolean('verified')->default(false)->after('new');
            $table->boolean('superagent')->default(false)->after('verified');
            $table->string('listing_agent_whatsapp')->nullable()->after('superagent');
            $table->enum('type', ['NA', 'Residential', 'Commercial', 'Holiday', 'Mortgages'])->nullable()->after('listing_agent_whatsapp');
            $table->foreignId('developer_id')->nullable()->constrained('developers')->nullOnDelete()->after('type');
            $table->foreignId('district_id')->nullable()->constrained('districts')->nullOnDelete()->after('developer_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->dropForeign(['developer_id']);
            $table->dropForeign(['district_id']);
            $table->dropColumn([
                'available_from',
                'description',
                'location',
                'brochure',
                'new',
                'verified',
                'superagent',
                'listing_agent_whatsapp',
                'type',
                'developer_id',
                'district_id',
            ]);
        });
    }
};
