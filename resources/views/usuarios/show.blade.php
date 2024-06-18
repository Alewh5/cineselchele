@extends('adminlte::page')

@section('title', 'Detalles del Usuario')

@section('content')

<h1>Detalles de la pelicula</h1>

<a href="{{ route('usuarios.index') }}" class="btn btn-primary">Atrás</a>
<a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-primary">Editar</a>
<p></p>
<div class="card">
    <div class="card-body">
        <p><strong>Nombre de usuario:</strong><br>
            {{ $user->name }}
        </p>
        <p><strong>ID:</strong><br>
            {{ $user->id }}
        </p>
        <p><strong>Rol / Rango:</strong><br>
            {{ $user->role }}
        </p>
        <p><strong>Correo Electronico:</strong><br>
            {{ $user->email }}
        </p>
        
    </div>
</div>
<div class="float-left">
    <button class="btn btn-danger btn-sm" onclick="confirmarEliminacion()">Eliminar Usuario</button>
    <form id="delete-user-form" action="{{ route('usuarios.destroy', $user->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
</div>
<script>
    function confirmarEliminacion() {
        if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
            document.getElementById('delete-user-form').submit();
        }
    }
</script>
@stop
