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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
    $table->date('fecha_pedido');  // Fecha del pedido
    $table->unsignedBigInteger('estado_id');  // Estado del pedido
    $table->unsignedBigInteger('tipo_cliente_id');  // Estado del pedido

    $table->unsignedBigInteger('metodo_pago_id')->nullable(); // Método de pago
    $table->decimal('total', 10, 2); // Total general del pedido (sumatoria de total en detalle_pedido)
    $table->text('observacion')->nullable(); // Observaciones adicionales

    // Relaciones de clave foránea
    $table->unsignedBigInteger('cliente_id'); // Clave foránea hacia la tabla clientes
    $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
    $table->foreign('tipo_cliente_id')->references('id')->on('tipo_de_clientes')->onDelete('cascade');
    $table->foreign('estado_id')->references('id')->on('estados_pedidos')->onDelete('cascade');
    $table->foreign('metodo_pago_id')->references('id')->on('metodos_de_pagos')->onDelete('set null');

            $table->timestamps();
        });
    }





    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
