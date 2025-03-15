<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('fitness_integrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userID'); // Ensure this matches the column name in the `users` table
            $table->string('providername');
            $table->string('apiKey');
            $table->json('activities');
            $table->timestamps();

            // Corrected foreign key constraint
            $table->foreign('userID')->references('userID')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fitness_integrations');
    }
};