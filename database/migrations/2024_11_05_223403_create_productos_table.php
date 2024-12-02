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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);               // Nombre del producto (ej., "Bidón de agua 20L")
            $table->text('descripcion')->nullable();     // Descripción del producto
            $table->decimal('precio_unitario', 10, 2);            // Precio del producto
            $table->integer('stock_actual');             // Cantidad actual de este producto en stock
           // $table->string('unidad', 50)->default('unidad'); // Unidad de medida (ej., "unidad", "litro")

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
