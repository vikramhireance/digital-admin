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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('website_title');
            $table->string('website_description');
            $table->string('live_mode');
            $table->string('light_logo');
            $table->string('dark_logo');
            $table->string('mobile_logo');
            $table->string('favicon');
            $table->string('primary_color');
            $table->string('secondary_color');
            $table->string('dark_mode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
