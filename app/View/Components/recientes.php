<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Pelicula;

class recientes extends Component
{
    public function render()
    {
        // Obtener las películas más recientes
        $peliculas = Pelicula::orderBy('created_at', 'desc')->take(5)->get();

        return view('components.recientes', compact('peliculas'));
    }
}
