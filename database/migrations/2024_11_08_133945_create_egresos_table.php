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
        Schema::create('egresos', function (Blueprint $table) {
            $table->id();
            $table->string('concepto'); // Concepto del egreso
            $table->string('precio_proveedor'); // Concepto del egreso

            $table->string('motivo')->nullable(); // Motivo del egreso (opcional)
            //$table->unsignedBigInteger('proveedor_id')->nullable(); // Relación con proveedor
            $table->decimal('monto', 10, 2); // Monto del egreso
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('egresos');
    }
};
