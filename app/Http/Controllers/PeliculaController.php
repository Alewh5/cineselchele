<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;

class PeliculaController extends Controller

{
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peliculas = Pelicula::all();
        return view('peliculas.create', compact('peliculas'));
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Pelicula::all();
        return view('peliculas.index', compact('peliculas'));
    }

    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $pelicula = Pelicula::where('slug', $slug)->firstOrFail();
        return view('peliculas.show', compact('pelicula'));
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
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'genero' => 'required|string|max:255',
            'clasificacion_edad' => 'required|string|max:255',
            'duracion' => 'required|integer|min:1',
            'banner' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        
        if ($request->hasFile('banner')) {
            $imagen = $request->file('banner');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $rutaImagen = $imagen->storeAs('public/peliculas', $nombreImagen); 
            $rutaImagen = str_replace('public/', 'storage/', $rutaImagen);  
        } else {
            $rutaImagen = null;
        }

        $pelicula = new Pelicula();
        $pelicula->titulo = $request->titulo;
        $pelicula->descripcion = $request->descripcion;
        $pelicula->genero = $request->genero; 
        $pelicula->clasificacion_edad = $request->clasificacion_edad;
        $pelicula->duracion = $request->duracion;
        $pelicula->banner = $rutaImagen;

        $pelicula->save();

        return redirect()->route('peliculas.index')
            ->with('success', 'Película creada exitosamente.');
    }

    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $pelicula = Pelicula::where('slug', $slug)->firstOrFail();

        return view('peliculas.edit', compact('pelicula'));
    }


    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'genero' => 'required|string|max:255',
            'clasificacion_edad' => 'required|string|max:255',
            'duracion' => 'required|integer|min:1',
        ]);

        $pelicula = Pelicula::where('slug', $slug)->firstOrFail();
        $pelicula->update($request->all());

        return redirect()->route('peliculas.index')
            ->with('success', 'Película actualizada exitosamente.');
    }


    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelicula = Pelicula::findOrFail($id);
        $pelicula->delete();

        return redirect()->route('peliculas.index')->with('success', 'Película eliminada exitosamente.');
    }
}

