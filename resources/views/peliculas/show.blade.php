@extends('adminlte::page')

@section('title', 'Detalles de la Película')

@section('content')

<h1>Detalles de la pelicula</h1>

<a href="{{ route('peliculas.index') }}" class="btn btn-primary">Atrás</a>
<a href="{{ route('peliculas.edit', $pelicula->id) }}" class="btn btn-primary">Editar</a>
<p></p>
<div class="card">
    <div class="card-body">
        <p><strong>Título:</strong><br>
            {{ $pelicula->titulo }}
        </p>
        <p><strong>Descripción:</strong><br>
            {{ $pelicula->descripcion }}
        </p>
        <p><strong>Género:</strong><br>
            {{ $pelicula->genero }}
        </p>
        <p><strong>Clasificación por Edad:</strong><br>
            {{ $pelicula->clasificacion_edad }}
        </p>
        <p><strong>Duración:</strong><br>
            {{ $pelicula->duracion }} minutos
        </p>
        @if($pelicula->banner)
        <p><strong>Banner:</strong><br>
            <img src="{{ asset('/' . $pelicula->banner) }}" alt="Banner de la Película" style="max-width: 300px;">
        </p>
        @endif
        
    </div>
</div>
<div class="float-left">
    <button class="btn btn-danger btn-sm" onclick="confirmarEliminacion()">Eliminar Película</button>
    <form id="delete-pelicula-form" action="{{ route('peliculas.destroy', $pelicula->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
</div>
<script>
    function confirmarEliminacion() {
        if (confirm('¿Estás seguro de que deseas eliminar esta película?')) {
            document.getElementById('delete-pelicula-form').submit();
        }
    }
</script>
@stop
