@extends('adminlte::page')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Solo se puede editar el rol o rango del usuario</h3>
                    <hr>
                </div>
                <br>
                <div>
                    <div class="card card-info">
                        <div class="card-header">
                                <h3 class="card-title">Funciones</h3>
                            </div>
                            <div class="card-body">
                                <p><strong>Funciones del Administrador:</strong></p>
                                    <ul>
                                        <li><strong>Gestión Completa del Sistema:</strong></li>
                                        <ul>
                                            <li><strong>Horarios:</strong> Administrar los horarios.</li>
                                            <li><strong>Sucursales:</strong> Crear, eliminar, y gestionar sucursales.</li>
                                            <li><strong>Salas:</strong> Crear, eliminar, y gestionar salas.</li>
                                            <li><strong>Usuarios:</strong> Administrar y gestionar todos los usuarios.</li>
                                            <li><strong>Películas:</strong> Agregar, editar, y eliminar películas.</li>
                                            <li><strong>Proyecciones:</strong> Administrar proyecciones de películas.</li>
                                            <li><strong>Asientos y Reservas:</strong> Gestionar asientos y reservas de usuarios.</li>
                                        </ul>
                                    </ul>
                            </div>
                            <div class="card-footer">
                                <p><strong>Funciones del Moderador:</strong></p>
                                <ul>
                                    <li><strong>Gestión Operativa del Sistema:</strong></li>
                                    <ul>
                                        <li><strong>Sucursales:</strong> Ver y gestionar detalles de las sucursales.</li>
                                        <li><strong>Salas:</strong> Ver detalles de las salas.</li>
                                        <li><strong>Películas:</strong> Agregar, editar, y eliminar películas.</li>
                                        <li><strong>Proyecciones:</strong> Crear, ver, y eliminar proyecciones de películas.</li>
                                        <li><strong>Asientos y Reservas:</strong> Gestionar asientos y reservas de usuarios.</li>
                                    </ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                <!-- form start -->
                <form role="form" method="POST" action="{{ route('usuarios.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="role">Rol / Rango</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-user-tag"></i>
                                    </span>
                                </div>
                                <select class="form-control" id="role" name="role" required>
                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="mod" {{ $user->role == 'mod' ? 'selected' : '' }}>Mod</option>
                                </select>
                            </div>
                            @error('role')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        <a href="{{ route('usuarios.index') }}" class="btn btn-default">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
