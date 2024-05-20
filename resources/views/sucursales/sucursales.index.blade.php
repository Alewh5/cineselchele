@extends('adminlte::page')

@section('title', 'Lista de Sucursales')

@section('content_header')
    <h1>Lista de Sucursales</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h5 class='text-center'>Hola! <p>{{ Auth::user()->name }}</p> desde aquí podrás administrar el cine </h5>

            <hr>

            <h5>Salas registradas</h5>
            <ul>
                @foreach($salas as $sala)
                    <li>{{ $sala->nombre }} - Capacidad: {{ $sala->capacidad_asientos }}</li>
                @endforeach
            </ul>

            <hr>

            <h5>Crear nueva sala</h5>
            <form action="{{ route('salas.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre de la sala:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="capacidad">Capacidad de asientos:</label>
                    <input type="number" class="form-control" id="capacidad" name="capacidad_asientos" required>
                </div>
                <button type="submit" class="btn btn-primary">Crear Sala</button>
            </form>
        </div>
    </div>
</div>
@stop
