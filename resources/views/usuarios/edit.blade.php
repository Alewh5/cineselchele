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
                <!-- /.box-header -->
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
