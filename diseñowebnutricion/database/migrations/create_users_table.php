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
            $table->json('allergies');
            $table->json('goals');
            $table->string('password_hash');
            $table->integer('age');
            $table->string('gender');
            $table->float('weight');
            $table->float('height');
            $table->string('activity_level');
            $table->timestamp('created_at')->useCurrent();
            $table->json('restrictions');
            $table->timestamps();
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