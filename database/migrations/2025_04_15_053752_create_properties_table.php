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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('type', ['house', 'apartment', 'land', 'commercial']);
            $table->string('location');
            $table->decimal('price', 10, 2);
            $table->integer('size'); // square footage or perches
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->enum('listing_type', ['sale', 'rent']);
            $table->enum('category', ['free', 'premium']);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
