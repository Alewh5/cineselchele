@extends('adminlte::page')

@section('title', 'Cines El Chele')

@section('content_header')
    <h1>Cines El Chele</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('salas.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="sucursal_id">Sucursal</label>
                <select name="sucursal_id" id="sucursal_id" class="form-control" required>
                    @foreach($sucursales as $sucursal)
                        <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre de la Sala</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="capacidad_asientos">Capacidad de Asientos</label>
                <input type="number" name="capacidad_asientos" id="capacidad_asientos" class="form-control" required min="1">
            </div>

            <button type="submit" class="btn btn-primary">Crear Sala</button>
        </form>
    </div>
</div>
@stop
