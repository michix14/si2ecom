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
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table->integer('ci')->unsigned();
            $table->string('nombre', 70);
            $table->string('direccion', 50)->nullable();
            $table->integer('telefono')->unsigned();
            $table->string('sexo', 1);
            $table->string('correo de contacto', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedors');
    }
};
