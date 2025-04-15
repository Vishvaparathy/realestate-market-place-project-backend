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
            $table->text('title_en')->nullable();
            $table->text('title_ta')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ta')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'title_ta', 'description_en', 'description_ta']);
        });
    }
};
