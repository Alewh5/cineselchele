<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;

class HorarioController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horarios = Horario::all();

        return view('horarios.index', compact('horarios'));
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horarios.create');
    }

    /**A
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pelicula_id' => 'required|exists:peliculas,id',
            'sucursal_id' => 'required|exists:sucursales,id',
            'fecha' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'duracion' => 'required|integer|min:1',
        ]);

        Horario::create($request->all());

        return redirect()->route('horarios.index')
                         ->with('success', 'Horario creado exitosamente.');
    }

    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $horario = Horario::findOrFail($id);

        return view('horarios.edit', compact('horario'));
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
            'pelicula_id' => 'required|exists:peliculas,id',
            'sucursal_id' => 'required|exists:sucursales,id',
            'fecha' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'duracion' => 'required|integer|min:1',
        ]);

        $horario = Horario::findOrFail($id);
        $horario->update($request->all());

        return redirect()->route('horarios.index')
                         ->with('success', 'Horario actualizado exitosamente.');
    }

    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();

        return redirect()->route('horarios.index')
                         ->with('success', 'Horario eliminado exitosamente.');
    }
}

