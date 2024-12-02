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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);       // Nombre del cliente
            $table->integer('ruc');       // Nombre del cliente
            $table->string('direccion', 255);    // Dirección del cliente
            $table->string('telefono', 20)->nullable(); // Teléfono de contacto (opcional)
            $table->string('email', 100)->nullable();    // Correo electrónico (opcional)
            $table->date('fecha_registro')->default(DB::raw('CURRENT_DATE')); // Fecha de registro
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
