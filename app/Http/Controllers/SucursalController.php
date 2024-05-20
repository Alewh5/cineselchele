<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;

class SucursalController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursales = Sucursal::orderBy('nombre')->get();

        return view('admin.index', compact('sucursales'));
    }

    public function show(Sucursal $sucursal)
    {
        return view('sucursales.show', compact('sucursal'));
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sucursales.create');
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
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'latitud' => 'required|numeric',
            'longitud' => 'required|numeric',
            'google_maps_link' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',

        ]);

        Sucursal::create($request->all());

        return redirect()->route('admin.index')
                         ->with('success', 'Sucursal creada exitosamente.');
    }

    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sucursal = Sucursal::findOrFail($id);

        return view('sucursales.edit', compact('sucursal'));
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
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'latitud' => 'required|numeric',
            'longitud' => 'required|numeric',
            'google_maps_link' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            
        ]);

        $sucursal = Sucursal::findOrFail($id);
        $sucursal->update($request->all());

        return redirect()->route('sucursales.index')
                         ->with('success', 'Sucursal actualizada exitosamente.');
    }

    public function destroy($id)
    {
        
        $sucursal = Sucursal::findOrFail($id);
        $sucursal->delete();

        return redirect()->route('sucursales.index')->with('success', 'Sucursal eliminada exitosamente.');
    }
}
