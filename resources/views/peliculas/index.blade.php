@extends('adminlte::page')

@section('title', 'Lista de Películas')

@section('content')
    <div class="container">
        <h1>Lista de Películas</h1>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Género</th>
                    <th>Clasificación de Edad</th>
                    <th>Duración (minutos)</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peliculas as $pelicula)
                    <tr>
                        <td><a href="{{ route('peliculas.show', $pelicula->slug) }}">{{ $pelicula->titulo }}</a></td>
                        <td>{{ $pelicula->genero }}</td>
                        <td>{{ $pelicula->clasificacion_edad }}</td>
                        <td>{{ $pelicula->duracion }}</td>
                        <td>
                            <a href="{{ route('peliculas.edit', $pelicula->slug) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('peliculas.destroy', $pelicula->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta película?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        <a href="{{ route('peliculas.create') }}" class="btn btn-primary">Agregar Película</a>
    </div>
@endsection
