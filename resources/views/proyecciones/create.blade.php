@extends('adminlte::page')

@section('title', 'Agregar Proyección')

@section('content_header')
    <h1>Agregar Proyección</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <p>La duración de la película es de {{ $duracion_pelicula }} minutos. Tómalo en cuenta y agrégale el tiempo de los spots.</p>
        <form action="{{ route('proyecciones.store') }}" method="POST" id="proyeccionForm">
            @csrf
            <input type="hidden" name="sala_id" value="{{ $sala->id }}">
            <div class="form-group">
                <label for="pelicula_id">Selecciona una película:</label>
                <select class="form-control" id="pelicula_id" name="pelicula_id">
                    @foreach($peliculas as $pelicula)
                        <option value="{{ $pelicula->id }}">{{ $pelicula->titulo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="hora_inicio">Hora de inicio:</label>
                <input type="datetime-local" class="form-control" id="hora_inicio" name="hora_inicio">
            </div>
            <div class="form-group">
                <label for="hora_fin">Hora de fin:</label>
                <input type="datetime-local" class="form-control" id="hora_fin" name="hora_fin"><br>
                <h6>Ten en cuenta que se agregaran 30 minutos para el tiempo de anuncios.</h6>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Proyección</button>
        </form>
    </div>
</div>

<script>
    function calcularHoraFin() {
        var duracionPelicula = {{ $duracion_pelicula }};
        var horaInicio = new Date(document.getElementById('hora_inicio').value);
        if (!isNaN(horaInicio.getTime())) {
            var horaInicioUTC = Date.UTC(
                horaInicio.getFullYear(),
                horaInicio.getMonth(),
                horaInicio.getDate(),
                horaInicio.getHours(),
                horaInicio.getMinutes()
            );
            var horaFinUTC = new Date(horaInicioUTC + (duracionPelicula + 30) * 60000);
            var horaFinFormato = new Date(horaFinUTC).toISOString().slice(0, 16);
            document.getElementById('hora_fin').value = horaFinFormato;
        }
    }
    document.getElementById('hora_inicio').addEventListener('change', calcularHoraFin);
</script>



@stop
