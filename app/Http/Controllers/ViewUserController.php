<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\Sucursal;

class ViewUserController extends Controller
{
    public function inicio()
    {
        return view('viewuser.inicio');
    }

    public function nosotros()
    {
        return view('viewuser.nosotros');
    }

    public function proyeccion()
    {
        $peliculas = Pelicula::all();
        return view('viewuser.proyeccion', compact('peliculas'));
    }

    public function sucursales()
    {
        $sucursales = Sucursal::orderBy('nombre')->get();

        return view('viewuser.sucursales', compact('sucursales'));
    }


}
