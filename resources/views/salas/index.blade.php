@extends('adminlte::page')

@section('title', 'Salas Registradas')

@section('content_header')
    <h1>Salas Registradas</h1>
@stop

@section('content')
<h1>Información de la Sala</h1>
<p><strong>ID:</strong> {{ $sala->id }}</p>
<p><strong>Sucursal ID:</strong> {{ $sala->sucursal_id }}</p>
<p><strong>Nombre:</strong> {{ $sala->nombre }}</p>
<p><strong>Capacidad de Asientos:</strong> {{ $sala->capacidad_asientos }}</p>
<p><strong>Creada el:</strong> {{ $sala->created_at }}</p>
<p><strong>Última actualización:</strong> {{ $sala->updated_at }}</p>

<hr>
<div>

</div>

@stop
