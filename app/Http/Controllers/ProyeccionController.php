<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyeccion;
use App\Models\Pelicula;
use App\Models\Sala;
USE App\Models\Reserva;

use App\Http\Controllers\SalaController;

class ProyeccionController extends Controller
{
    /**
     * .
     *
     * @param  int  $sala_id
     * @return \Illuminate\Http\Response
     */
    public function create($sala_id)
    {
        $peliculas = Pelicula::all();
        $sala = Sala::findOrFail($sala_id); 
        
        
        $duracion_pelicula = $peliculas->first()->duracion ?? 'No disponible';
        
        return view('proyecciones.create', compact('peliculas', 'sala', 'duracion_pelicula')); 
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sala_id' => 'required',
            'pelicula_id' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);

        
        Proyeccion::create($request->all());

        $sala = Sala::findOrFail($request->input('sala_id'));
        $salaSlug = $sala->slug;

        // Redireccion
        return redirect()->route('salas.show', ['slug' => $salaSlug])
                         ->with('success', 'Proyección creada exitosamente.');
    }


    /**
     * 
     *
     * @param  int  $sala_id
     * @return \Illuminate\Http\Response
     */
    public function index($sala_id)
    {
        $proyecciones = Proyeccion::where('sala_id', $sala_id)->get();
        return view('proyecciones.index', compact('proyecciones'));
    }

    public function show($id)
    {
        $proyeccion = Proyeccion::with('pelicula')->findOrFail($id);
        
        $pelicula = $proyeccion->pelicula;
        $sala = $proyeccion->sala;
        $asientos = $proyeccion->asientos;
        
    
        $reservas = Reserva::where('proyeccion_id', $id)->with('user')->get();
        $reservas = Reserva::where('proyeccion_id', $id)->with('proyeccion')->get();

        return view('proyecciones.show', compact('proyeccion', 'pelicula', 'sala', 'reservas'));
    }
    

    public function otraFuncion() //esta funcion es para obtener informacion de la tabla salas
    {
        // Obtener la información de la sala
        $sala = Sala::find(1);
        $proyeccion = Proyeccion::first();

        session(['sala' => $sala]);
    
        return redirect()->route('proyecciones.show', ['id' => $proyeccion->id]);
    }
    


    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 

    public function edit($id)
    {
        $proyeccion = Proyeccion::findOrFail($id);
        return view('proyecciones.edit', compact('proyeccion'));
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'sala_id' => 'required',
            'pelicula_id' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);

        $proyeccion = Proyeccion::findOrFail($id);
        $proyeccion->update($request->all());

        return redirect()->route('proyecciones.index')
                         ->with('success', 'Proyección actualizada exitosamente.');
    }

    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyeccion = Proyeccion::findOrFail($id);
        $sala = $proyeccion->sala;

        $asientos = $proyeccion->asientos;
        foreach ($asientos as $asiento) {
            $asiento->update(['reserva' => 0]);
        }

        $proyeccion->delete();

        $salaSlug = $sala->slug;

        return redirect()->route('salas.show', ['slug' => $salaSlug])
                        ->with('success', 'Proyección eliminada exitosamente.');
    }

}
