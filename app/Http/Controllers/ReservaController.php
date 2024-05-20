<?php

namespace App\Http\Controllers;

use App\Models\Proyeccion;
use App\Models\Reserva;

use Illuminate\Http\Request;
use App\Models\Asiento;
use App\Models\User;
use App\Models\Sala;

class ReservaController extends Controller
{   
    public function index()
    {

    $reservas = Reserva::with('user')->get();
    $personasConReservas = $reservas->pluck('user')->unique();

    return view('proyecciones.show', compact('personasConReservas'));
    }

    public function create(Request $request)
    {
        $proyeccion_id = $request->query('proyeccion_id');
    
        $proyeccion = Proyeccion::findOrFail($proyeccion_id);
        $sala = $proyeccion->sala;

        if (!$sala) {
            abort(404, 'La sala asociada a la proyección no existe');
        }
    
        $users = User::all();
        $asientos = Asiento::where('estado', 'Disponible')->get();
    
        return view('reservas.create', compact('proyeccion_id', 'users', 'asientos', 'sala'));
    }
    

    public function store(Request $request)
    {
        $data = $request->validate([
            'proyeccion_id' => 'required|exists:proyecciones,id',
            'user_id' => 'required|exists:users,id',
            'asiento_id' => 'required|exists:asientos,id',
        ]);
        Reserva::create($data);
        return redirect()->route('proyecciones.show', ['id' => $request->proyeccion_id])->with('success', 'Reserva creada exitosamente.');
    }

    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();
        
        return redirect()->route('proyecciones.show', ['id' => $reserva->proyeccion_id])
                        ->with('success', 'Reserva y datos de asiento eliminados exitosamente.');
    }
    
    

}