@extends('adminlte::page')

@section('title', 'Crear usuario')

@section('content')
    <div class="container">
        <h1>Agregar usuario</h1> 
        <hr>
        
        <div>
            <h3>Pasos para agregar usuario:</h3><br>

            <p>Para agregar usuarios debes registrarlo como usuario normal en aqui en <a href="{{ route('register') }}">Registrar</a></p>
            <p>Luego debes regresar y darle en editar para cambiar sus roles administrativos.</p>

        </div>     
    </div>
@endsection
