@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content')
    <div class="container">
        <h1>Lista de usuarios</h1>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>ID</th>
                    <th>Correo</th>
                    <th>Roll / rango </th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td><a href="{{ route('usuarios.show', $user->id) }}">{{ $user->name }}</a></td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Agregar usuario</a>
    </div>
@endsection
