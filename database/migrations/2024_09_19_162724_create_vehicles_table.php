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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // Tipo de vehículo (e.g., camión, furgoneta)
            $table->integer('capacity'); // Capacidad del vehículo
            $table->string('status')->default('disponible'); // Estado del vehículo (e.g., disponible, en mantenimiento)
            $table->string('imagen')->nullable();
            $table->timestamps(); // Tiempos de creación y actualización
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};