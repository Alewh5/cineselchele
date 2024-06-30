<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('usuarios.index', compact('users'));
    }

    public function show($id)
    {
        $user = user::where('id', $id)->firstOrFail();
        return view('usuarios.show', compact('user'));
    }

    public function create()
    {
        $user = user::all();
        return view('usuarios.create', compact('user'));
    }

    public function edit($id)
    {
        $user = user::where('id', $id)->firstOrFail();

        return view('usuarios.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->role = $request->input('role'); 
        $user->save(); 

        return redirect()->route('usuarios.index')->with('success', 'Rol actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('usuarios.index')->with('success', 'usuario eliminado exitosamente.');
    }

    public function profilead()
    {
        return view('profile.admin');
    }
}
