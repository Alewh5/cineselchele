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
        Schema::create('proyecciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sala_id');
            $table->unsignedBigInteger('pelicula_id');
            $table->dateTime('hora_inicio');
            $table->dateTime('hora_fin');

            $table->timestamps();

            $table->foreign('sala_id')->references('id')->on('salas')->onDelete('cascade');
            $table->foreign('pelicula_id')->references('id')->on('peliculas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyecciones');
    }
};
