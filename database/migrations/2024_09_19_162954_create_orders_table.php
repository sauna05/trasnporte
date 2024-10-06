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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
             // El cliente hace el pedido
             $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade')->onUpdate('cascade');
             $table->string('charge'); // Carga del pedido
             $table->foreignId('route_id')->constrained('routes')->onDelete('cascade')->onUpdate('cascade'); // Referencia a la ruta
             $table->date('date'); // Fecha del pedido
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
