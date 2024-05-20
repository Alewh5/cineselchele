@extends('adminlte::page')

@section('title', 'Cines El Chele')

@section('content_header')
    <h1>Cines El Chele</h1>
@stop

@section('content')

<style>
    .btn-custom {
        background-color: #007bff;
        color: #ffffff;
        transition: background-color 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #0056b3; 
    }
</style>

<div class="card">
    <div class="card-body">
        <form action="{{ route('sucursales.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre de la Sucursal</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="latitud">Latitud</label>
                <input type="text" name="latitud" id="latitud" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="longitud">Longitud</label>
                <input type="text" name="longitud" id="longitud" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" name="telefono" id="telefono" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="google_maps_link">Enlace de Google Maps</label>
                <input type="text" name="google_maps_link" id="google_maps_link" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Crear Sucursal</button>
        </form>
    </div>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop