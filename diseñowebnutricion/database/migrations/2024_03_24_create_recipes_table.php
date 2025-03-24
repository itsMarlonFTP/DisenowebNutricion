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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id('recipeID');
            $table->string('title');
            $table->text('description');
            $table->json('ingredients');
            $table->json('instructions');
            $table->integer('preparation_time');
            $table->integer('cooking_time');
            $table->integer('servings');
            $table->integer('calories');
            $table->float('protein');
            $table->float('carbohydrates');
            $table->float('fats');
            $table->string('category');
            $table->enum('difficulty_level', ['fácil', 'medio', 'difícil']);
            $table->string('image_url')->nullable();
            $table->foreignId('created_by')->constrained('users', 'userID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
}; 