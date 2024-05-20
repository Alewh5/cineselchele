@extends('adminlte::page')

@section('title', 'Cines El Chele')

@section('content_header')
    <h1>Cines El Chele</h1>
@stop

@section('content')
    <div>
        <h1>Asientos:</h1>
        <div class="saladiv">
            <div>
                <h2>Asientos disponibles</h2>
                <p>Capacidad máxima de la sala: {{ $sala->capacidad_asientos }}</p>
            </div>
            <div class="asientosdiv">
                @for ($i = 1; $i <= $sala->capacidad_asientos; $i++)
                    <a href="{{ route('asientos.show', ['id' => $i]) }}" class="asientosdiv boton-asiento">N {{ $i }}</a> <!-- Agregamos la clase "boton-asiento" -->
                    @if ($i % 10 == 0)
                        <br> <!-- Agregamos un cambio de línea después de cada 10 elementos -->
                    @endif
                @endfor
            </div>
        </div>
    </div>

    <div>
        <h1>Listado de reservas:</h1>
        <div class="reservasdiv">
            @foreach($proyecciones as $proyeccion)
                <div class="reserva">
                    <p>Película: {{ $proyeccion->pelicula->titulo }}</p>
                    <p>Hora de inicio: {{ $proyeccion->hora_inicio }}</p>
                    <!-- Agrega más información sobre la reserva si es necesario -->
                </div>
            @endforeach
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const asientos = document.querySelectorAll('.boton-asiento');
            asientos.forEach(asiento => {
                asiento.addEventListener('click', function(event) {
                    // Prevenir el comportamiento predeterminado del enlace
                    event.preventDefault();
                    // Obtener el ID del asiento desde el texto del enlace
                    const asientoId = this.textContent.trim().split(' ')[1];
                    // Redirigir al usuario a la página de detalles del asiento con el ID correspondiente
                    window.location.href = this.getAttribute('href') + '?asiento_id=' + asientoId;
                });
            });
        });
    </script>
@stop
