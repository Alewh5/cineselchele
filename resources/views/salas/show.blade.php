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


<h1>Información de la Sala {{ $sala->nombre }} </h1>
<p> Capacidad:  {{ $sala->capacidad_asientos }}</p>



<a href="#" class="btn btn-primary btn-sm btn-custom" onclick="window.history.back()">Atrás</a>

<div>
    <h1>Proyecciones Asociadas</h1>
    <div class="dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
        <div class="row justify-content-center">
            @if (!$sala->proyecciones->isEmpty())
                @foreach ($sala->proyecciones as $proyeccion)
                    <div class="col-md-4 mb-4">
                        <a href="{{ route('proyecciones.show', $proyeccion->id) }}">
                            <div class="p-5 bg-white rounded-lg shadow-lg">
                                <p><strong>proyeccion:</strong> {{ $proyeccion->id }}</p>
                                <p><strong>Título de la película:</strong> {{ $proyeccion->pelicula->titulo }}</p>
                                <p><strong>Hora de inicio:</strong> {{ $proyeccion->hora_inicio }}</p>
                                <p><strong>Hora de fin:</strong> {{ $proyeccion->hora_fin }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <p class="text-center">No hay proyecciones asociadas.</p>
            @endif
        </div>
    </div>
    <a href="{{ route('proyecciones.create', ['sala_id' => $sala->id]) }}" class="btn btn-primary btn-sm btn-custom">Agregar Proyecciones</a>
    
</div>


<hr>
<form id="delete-form" action="{{ route('salas.destroy', $sala->id) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete()">Eliminar Sala</button>
</form>
<script>
    function confirmDelete() {
        return confirm('¿Estás seguro de que deseas eliminar esta sala?');
    }
</script>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
