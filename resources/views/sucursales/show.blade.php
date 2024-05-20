@extends('adminlte::page')

@section('title', 'Cines El Chele')

@section('content_header')
    <h1>Cines El Chele</h1>
@stop

@section('content')

<style>
    .btn-custom {
        background-color: #007bff;
        color: #ffffff;
        transition: background-color 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #0056b3; 
    }
</style>


<div>
    <h5 class='text-center'>¡Hola! <p>{{ Auth::user()->name }}</p> desde aquí podrás administrar el cine.</h5>
    <h2>Salas de {{ $sucursal->nombre }}</h2>
    @if ($sucursal->salas->isEmpty())
        <p>NO HAY SALAS REGISTRADAS</p>
    @else
    
        <div class="row">
            @foreach($sucursal->salas as $sala)
                <div class="col-md-4 mb-4">
                    <div class="dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                        <a href="{{ route('salas.show', $sala->slug) }}" class="btn btn-primary btn-lg btn-block py-5 btn-custom">
                        <i class="bi bi-person"></i> {{ $sala->nombre }} <br> {{ $sala->capacidad_asientos }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    
    <div class="text-right">
        <a href="{{route('salas.create')}}" class="btn btn-primary">Crear sala</a>
    </div>
    <hr>
</div>



<h1>{{ $sucursal->nombre }}</h1>
<p><strong>Dirección:</strong> {{ $sucursal->direccion }}</p>
<p><strong>Latitud:</strong> {{ $sucursal->latitud }}</p>
<p><strong>Longitud:</strong> {{ $sucursal->longitud }}</p>
<p><strong>Teléfono:</strong> {{ $sucursal->telefono }}</p>
<p><strong>Registrada el:</strong> {{ $sucursal->created_at }}</p>
<p><strong>Última actualización:</strong> {{ $sucursal->updated_at }}</p>
<p><strong>Google Maps:</strong> {{ $sucursal->google_maps_link }}</p>

<hr>
<div class="text-right">
    <form id="delete-sucursal-form" action="{{ route('sucursales.destroy', $sucursal->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="button" class="btn btn-danger" onclick="confirmarEliminacion()">Eliminar Sucursal</button>
    </form>
</div>

<script>
    function confirmarEliminacion() {
        if (confirm('¿Estás seguro de que deseas eliminar esta sucursal?')) {
            document.getElementById('delete-sucursal-form').submit();
        }
    }
</script>


@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
