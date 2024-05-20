<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sala;
use App\Models\Sucursal;
use App\Models\Asiento;

class SalaController extends Controller
{
    /**
     * Muestra la información detallada de una sala específica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $sala = Sala::where('slug', $slug)->firstOrFail();
        

        return view('salas.show', compact('sala'));
    }

    /**
     * Muestra una lista de todas las salas.
     *
     * @param  int  $sucursal_id
     * @return \Illuminate\Http\Response
     */
    public function index($sucursal_id)
    {
        $salas = Sala::where('sucursal_id', $sucursal_id)->get();
        return view('salas.index', compact('salas'));
    }

    /**
     * Muestra el formulario para crear una nueva sala.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sucursales = Sucursal::all(); // Obtener la lista de todas las sucursales
        return view('salas.create', compact('sucursales')); // Pasar la lista de sucursales a la vista
    }

    /**
     * Almacena una nueva sala en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'sucursal_id' => 'required|exists:sucursales,id',
        'nombre' => 'required|string|max:255',
        'capacidad_asientos' => 'required|integer|min:1',
    ]);

    $sala = Sala::create($request->all());


    for ($i = 1; $i <= $request->capacidad_asientos; $i++) {
        $asiento = new Asiento();
        $nombreAsiento = 'N ' . $i; // Generar nombre del asiento
        $asiento->nombre = $nombreAsiento; // Asignar nombre del asiento
        $asiento->sala_id = $sala->id; // Asociar el asiento con la sala recién creada
        $asiento->save();
    }

    $sucursalSlug = Sucursal::findOrFail($request->input('sucursal_id'))->slug;
    return redirect()->route('sucursal.show', ['sucursal' => $sucursalSlug])
                    ->with('success', 'Sala creada exitosamente.');
}

    


    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sala = Sala::findOrFail($id);

        return view('salas.edit', compact('sala'));
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
            'sucursal_id' => 'required|exists:sucursals,id',
            'nombre' => 'required|string|max:255',
            'capacidad_asientos' => 'required|integer|min:1',
        ]);

        $sala = Sala::findOrFail($id);
        $sala->update($request->all());

        return redirect()->route('salas.index')
                         ->with('success', 'Sala actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $sala = Sala::findOrFail($id);
        $sucursal = $sala->sucursal;
        $sala->delete();
        $sucursalSlug = $sucursal->slug;

        return redirect()->route('sucursal.show', ['sucursal' => $sucursalSlug])
                         ->with('success', 'Sala eliminada exitosamente.');
    }



}
