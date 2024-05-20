@extends('adminlte::page')

@section('content_header')
    <h1>Crear nueva película</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ingrese los detalles de la película</h3>
                    
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{ route('peliculas.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingrese el título" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripción" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="genero">Género</label>
                            <input type="text" class="form-control" id="genero" name="genero" placeholder="Ingrese el género" required>
                        </div>
                        <div class="form-group">
                            <label for="clasificacion_edad">Clasificación de Edad</label>
                            <input type="text" class="form-control" id="clasificacion_edad" name="clasificacion_edad" placeholder="Ingrese la clasificación de edad" required>
                        </div>
                        <div class="form-group">
                            <label for="duracion">Duración (minutos)</label>
                            <input type="number" class="form-control" id="duracion" name="duracion" placeholder="Ingrese la duración en minutos" required>
                        </div>
                        <div class="form-group">
                            <label for="banner">Banner</label>
                            <input type="file" id="banner" name="banner">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Guardar película</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
