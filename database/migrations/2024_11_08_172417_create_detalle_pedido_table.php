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
        Schema::create('detalle_pedido', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pedido_id'); // Referencia al pedido
            $table->unsignedBigInteger('producto_id'); // Referencia al producto
            $table->integer('cantidad'); // Cantidad del producto pedido
           // $table->decimal('precio_unitario', 10, 2); // Precio unitario del producto
            $table->decimal('precio_gral', 10, 2); // Precio total del producto (cantidad * precio_unitario)

            // Relaciones de clave foránea
            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_pedido');
    }
};
