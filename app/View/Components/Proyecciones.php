<?php

namespace App\View\Components;

use App\Models\Pelicula;
use Illuminate\View\Component;
use App\Models\Proyeccion;
use App\Models\Sala;
use App\Models\Sucursal;

class Proyecciones extends Component
{
    public $proyecciones;
    public $peliculas;
    public $salas;
    public $sucursal;

    public function __construct()
    {
        $this->proyecciones = Proyeccion::with('pelicula', 'sala', 'sala.sucursal')->get();
        $this->proyecciones = Proyeccion::all();
        $this->peliculas = Pelicula::all();
        $this->salas = Sala::all();
        $this->sucursal = Sucursal::all();
    }

    public function render()
    {
        return view('components.proyecciones');
    }
}
