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
            $table->string("vehiculo"); 
            $table->string("modelo")->nullable();;             
            $table->integer("puertas")->nullable();; 
            $table->string("luces")->nullable();; 
            $table->boolean('direccion_asistida')->nullable();;
            $table->boolean('ABS')->nullable();;
            $table->boolean('Airbags')->nullable();;
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
