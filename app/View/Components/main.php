<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Pelicula;

class Main extends Component
{
    public $peliculaAleatoria;

    public function __construct()
    {
        $this->peliculaAleatoria = Pelicula::inRandomOrder()->first();
    }

    public function render()
    {
        return view('components.main');
    }
}
