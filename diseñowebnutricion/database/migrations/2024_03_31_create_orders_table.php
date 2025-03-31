<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userID')->references('userID')->on('users')->onDelete('cascade');
            $table->string('plan_type'); // tipo de plan (básico, premium, etc.)
            $table->text('requirements'); // requisitos específicos del usuario
            $table->enum('status', ['pending', 'in_progress', 'in_route', 'delivered', 'cancelled'])->default('pending');
            $table->decimal('price', 10, 2);
            $table->text('delivery_photo')->nullable(); // foto de evidencia de entrega
            $table->text('route_photo')->nullable(); // foto de evidencia en ruta
            $table->timestamp('delivered_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamps();
            $table->softDeletes(); // para borrado lógico
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}; 