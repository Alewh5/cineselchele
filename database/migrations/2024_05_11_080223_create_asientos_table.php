<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Models\Sala;

class CreateAsientosTable extends Migration
{
    public function up()
{
    Schema::create('asientos', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('proyeccion_id')->nullable(); 
        $table->unsignedBigInteger('sala_id')->nullable();
        $table->unsignedBigInteger('user_id')->nullable();
        
        $table->string('nombre');
        // $table->boolean('reservado')->default(false);
        $table->enum('estado', ['Disponible', 'Reservado'])->default('Disponible');
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('proyeccion_id')->references('id')->on('proyecciones')->onDelete('cascade');
        $table->foreign('sala_id')->references('id')->on('salas')->onDelete('cascade'); // Agregar clave foránea para sala_id
        
    });

    
    $proyecciones = DB::table('proyecciones')->pluck('id');
    $capacidadMaxima = Sala::max('capacidad_asientos');

    
    $asientos = [];
    foreach ($proyecciones as $proyeccionId) {
        for ($i = 1; $i <= $capacidadMaxima; $i++) {
            $nombreAsiento = 'N ' . $i;
            $asientos[] = [
                'nombre' => $nombreAsiento,
                'proyeccion_id' => $proyeccionId, // Asignar la proyección correspondiente a cada asiento
                'sala_id' => null, // Dejar el campo sala_id como nulo inicialmente
            ];
        }
    }

    // Insertar los asientos en la tabla de asientos
    DB::table('asientos')->insert($asientos);
}


    public function down()
    {
        Schema::dropIfExists('asientos');
    }
}
