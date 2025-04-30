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
            $table->id(); // Campo autoincrementable
            $table->string('nombre');
            $table->text('descripcion');
            $table->decimal('precio', 8, 0);
            $table->integer('stock');
            $table->timestamps(); // Campo de fecha (DD-MM-YYYY HH:MM:SS)
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
