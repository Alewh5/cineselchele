@extends('adminlte::page')

@section('title', 'Cines El Chele')

@section('content_header')
    <h1>Cines El Chele</h1>
@stop

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    .btn-custom {
        background-color: #007bff;
        color: #ffffff;
        transition: background-color 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #0056b3; /* Color ligeramente más oscuro */
    }
</style>

    <h5 class='text-center'>Hola! <p>{{Auth::user()->name}}</p> desde aqui podras administrar el cine </h5>

    <h1>Sucursales Registradas</h1>
    <div class=" dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
        <div class="row justify-content-center">
            @foreach($sucursales as $sucursal)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('sucursal.show', $sucursal->slug) }}" class="btn btn-primary btn-lg btn-block py-5">
                        <i class="bi bi-building"></i> {{ $sucursal->nombre }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>    
    <div class="text-right">
        <a href="{{ route('sucursales.create')}} " class="btn btn-primary">Crear Sucursal</a>
    </div>
    <hr>

    <h5>Crear nueva Sucursal</h5>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop