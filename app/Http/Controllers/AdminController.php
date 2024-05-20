<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;


class AdminController extends Controller
{
    public function index(){
        $sucursales = Sucursal::all();


        return view('admin.index', compact('sucursales'));
    }
}
