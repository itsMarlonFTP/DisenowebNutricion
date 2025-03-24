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
        Schema::create('users', function (Blueprint $table) {
            $table->id('userID');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable(); 
            $table->text('allergies')->nullable();
            $table->text('goals')->nullable();
            $table->string('password')->nullable();
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->float('weight')->nullable();
            $table->float('height')->nullable();
            $table->string('activity_level')->nullable();
            $table->text('restrictions')->nullable();
            $table->timestamps();
            $table->rememberToken();

            // Agregando índices para mejorar el rendimiento
            $table->index('name');
            $table->index(['age', 'gender']); // Índice compuesto para filtros comunes
            $table->index('activity_level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
