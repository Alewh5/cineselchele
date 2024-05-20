@extends('adminlte::page')

@section('title', 'Detalles de la Proyección')

@section('content_header')
    <h1>Detalles de la Proyección</h1>
@stop

@section('content')
<a href="#" class="btn btn-primary btn-sm btn-custom" onclick="window.history.back()">Atrás</a>
<style>
    
.boton-asiento {
    display: inline-block;
    padding: 10px 20px;
    margin: 5px;
    background-color: #fff; 
    color: #000; 
    border: 2px solid #007bff88; 
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
}

.boton-asiento:hover {
    background-color: #2e6eb3;
    color: #ffffff; 
}

.table th, .table td {
    vertical-align: middle;
    text-align: center;
}
.table .btn {
    margin: 0 auto;
}

.reservado 
{
    background-color: rgb(118, 123, 124); 
    color: white; 
}
</style>
<p></p>
<div class="card">
    <div class="card-body">
        <p><strong>Título: <br>
            </strong> {{ $pelicula->titulo }}</p>
        <p><strong>Hora de inicio: <br>
            </strong> {{ $proyeccion->hora_inicio }}</p>
        <p><strong>Hora de fin: <br>
            </strong> {{ $proyeccion->hora_fin }}</p>
        <p><strong>Descripción: <br>
            </strong> {{ $pelicula->descripcion }}</p>
    </div>
</div>
<br>
<div class="float-right">
    <button class="btn btn-danger btn-sm" onclick="confirmarEliminacion()">Eliminar Proyección</button>
    <form id="delete-proyeccion-form" action="{{ route('proyecciones.destroy', $proyeccion->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
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
                <a href="#" class="asientosdiv boton-asiento {{ $asiento->estado == 'Reservado' ? 'reservado' : '' }}">{{ $asiento->nombre }}</a>
                @if ($loop->iteration % 10 == 0)
                    <br> 
                @endif
            @endforeach

        </div>
    </div>
</div>
<a href="{{ route('reserva.create', ['proyeccion_id' => $proyeccion->id]) }}" class="btn btn-primary">
    Agregar Reservas
</a>

<div class="card mt-4">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <span>Listado de personas con reservas para esta proyección</span>
        
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Correo</th>
                    <th>Sala</th>
                    <th>Pelicula</th>
                    <th>Inicio y Fin</th>
                    <th>Asientos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $reserva)
                    <tr>
                        <td>{{ $reserva->user->email }}</td>
                        <td>{{ $reserva->proyeccion->sala_id }}</td>
                        <td>{{ $pelicula->titulo }}</td>
                        <td>{{ $proyeccion->hora_inicio }}<br>{{ $proyeccion->hora_fin }}</td>
                        <td>{{ $reserva->asiento->nombre}}
                        </td>
                        <td>
                            <form action="{{ route('reserva.destroy', $reserva->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta reserva?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



<br>
<br>
</div>
</div>
<script>
    function confirmarEliminacion() {
        if (confirm('¿Estás seguro de que deseas eliminar esta proyección?')) {
            document.getElementById('delete-proyeccion-form').submit();
        }
    }
</script>


@stop
