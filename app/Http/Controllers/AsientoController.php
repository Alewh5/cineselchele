<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asiento;
use App\Models\Proyeccion;
use App\Models\Sala;

class AsientoController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asientos = Asiento::all();
        $sala = Sala::findOrFail($id);
        return view('asientos.show', compact('asientos'),[
            'sala' => $sala
        ]);
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  string  $estado  
     * @return \Illuminate\Http\Response
     */
    public function manejarEstado(Request $request, $id, $estado)
    {
        if (!in_array($estado, ['Disponible', 'Reservado'])) {
            return back()->with('error', 'Estado no válido.');
        }

        $asiento = Asiento::findOrFail($id);
        
        if ($asiento->estado === $estado) {
            return back()->with('error', "El asiento ya está en estado '$estado'.");
        }

        $asiento->estado = $estado;
        $asiento->save();

        return back()->with('success', "El asiento ha sido actualizado a '$estado' exitosamente.");
    }

        

    public function mostrarAsientos($id)
    {
        $proyeccion = Proyeccion::with('sala')->findOrFail($id);
        $sala = $proyeccion->sala;

        $capacidad_maxima = $sala->capacidad_asientos;

        $asientos = Asiento::where('sala_id', $sala->id)->limit($capacidad_maxima)->get();

        return view('nombre_de_tu_plantilla', [
            'proyeccion' => $proyeccion,
            'sala' => $sala,
            'asientos' => $asientos,
            'capacidad_maxima' => $capacidad_maxima, 
        ]);
    }

}
