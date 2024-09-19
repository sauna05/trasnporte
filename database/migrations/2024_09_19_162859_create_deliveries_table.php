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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('route_id')->constrained()->onDelete('cascade'); // Ruta asociada
            // $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Pedido asociado
            $table->string('status')->default('pending'); // Estado de la entrega
            $table->date('delivery_date')->nullable();// Fecha de entrega
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
