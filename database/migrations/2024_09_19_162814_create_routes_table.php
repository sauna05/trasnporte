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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->string('origin'); // Origen de la ruta
            $table->string('destination'); // Destino de la ruta
            $table->float('distance'); // Distancia de la ruta
            $table->enum('status', ['pendiente', 'en curso', 'entregada'])->default('pendiente'); // Estado de la entrega

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
