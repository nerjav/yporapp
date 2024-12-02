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
        Schema::create('inventario', function (Blueprint $table) {
            $table->id();
            $table->integer('vidones_disponibles'); // Cantidad de vidones disponibles en el inventario
            $table->integer('vidones_recargados');  // Cantidad de vidones recargados en un día específico
            $table->integer('vidones_vendidos');    // Cantidad de vidones vendidos en un día específico
            $table->integer('vidones_devueltos');   // Cantidad de vidones devueltos por los clientes
            $table->date('fecha');                  // Fecha del registro de inventario
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};
