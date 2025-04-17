<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->text('address')->nullable();
            $table->text('map')->nullable();
            $table->text('emails')->nullable();
            $table->text('contacts')->nullable();
            $table->string('address_icon')->nullable();
            $table->string('contact_icon')->nullable();
            $table->string('email_icon')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_us');
    }
};
