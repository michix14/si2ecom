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
            $table->string('nombre',50);
            $table->integer('stock');
            $table->string('descripcion',75);
            $table->decimal('precioventa',9,2);
            $table->text('imagen_url')->nullable();
            $table->foreignId('id_marca')
            ->nullable()
            ->constrained('marcas')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->foreignId('id_categoria')
            ->nullable()
            ->constrained('categorias')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            
            
            //$table->timestamps();
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
