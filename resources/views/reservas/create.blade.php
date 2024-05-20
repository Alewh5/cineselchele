@extends('adminlte::page')

@section('title', 'Detalles de Reserva')

@section('content_header')
    <h1>Detalles de Reserva</h1>
@stop

@section('content')
<div class="container">
    <h1>Crear Reserva</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('reserva.store') }}" method="POST">
        @csrf
        <input type="hidden" name="proyeccion_id" value="{{ $proyeccion_id }}">

        <div class="form-group">
            <label for="user_id">Usuario</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                @endforeach
            </select>
        </div>

        <div class="container">
            <h1>Asientos:</h1>
            <div class="saladiv">
                <div>
                    <h2>Asientos disponibles</h2>
                    <p>Capacidad máxima de la sala: {{ $sala->capacidad_asientos }}</p>
                </div>
                <div class="asientosdiv">
                    @foreach ($sala->asientos as $asiento)
                        <label class="asiento-label">
                            <input type="radio" name="asiento_id" value="{{ $asiento->id }}" class="asiento-radio">
                            <span class="boton-asiento">{{ $asiento->nombre }}</span>
                        </label>
                        @if ($loop->iteration % 10 == 0)
                            <br> 
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Crear Reserva</button>
    </form>
</div>

<style>
    .asiento-label {
        display: inline-block;
        margin: 5px;
    }

    .boton-asiento {
        display: inline-block;
        padding: 10px 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        cursor: pointer;
        background-color: #f8f9fa;
    }

    .asiento-radio:checked + .boton-asiento {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }
</style>

@stop
