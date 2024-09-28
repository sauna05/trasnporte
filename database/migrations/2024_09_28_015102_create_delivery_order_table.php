<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryOrderTable extends Migration
{
    public function up()
    {
        Schema::create('delivery_order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('delivery_id')->constrained()->onDelete('cascade'); // Clave foránea a entregas
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Clave foránea a pedidos
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('delivery_order');
    }
}