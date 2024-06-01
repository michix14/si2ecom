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
        Schema::create('detalle_de_entrada', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nota_de_entrada')
            ->references('id')->on('nota_de_entrada')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('producto')
            ->references('id')->on('productos')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->integer('cantidad');
            $table->decimal('precio', 12, 2);
            $table->decimal('total', 12, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_de_entrada');
    }
};
