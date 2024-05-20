@extends('adminlte::page')

@section('title', 'Detalles de Reserva')

@section('content_header')
    <h1>Detalles de Reserva</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Información de Reserva</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID de Reserva</th>
                            <td>{{ $reserva->id }}</td>
                        </tr>
                        <tr>
                            <th>Proyección</th>
                            <td>{{ $reserva->proyeccion->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Usuario</th>
                            <td>{{ $reserva->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Asiento</th>
                            <td>{{ $reserva->asiento->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Creación</th>
                            <td>{{ $reserva->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Última Actualización</th>
                            <td>{{ $reserva->updated_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
