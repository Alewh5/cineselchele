<!-- Dentro de tu vista peliculas.index.blade.php -->
@php
    $peliculaAleatoria = \App\Models\Pelicula::inRandomOrder()->first();
@endphp

<style>
    .pelicula-principal {
        font-size: 16px;
        min-height: 40.62em;
        color: #ffffff;
        background: linear-gradient(rgba(0, 0, 0, .50) 0%, rgba(0, 0, 0, .50) 100%), url('{{ $peliculaAleatoria->banner }}') @if ($peliculaAleatoria->banner) no-repeat center center; @endif;
        background-position: center center; /* Ajusta el tamaño de la imagen de fondo */
        background-size: cover;
        margin-bottom: 3.12em;
        display: flex;
        align-items: end;
    }

    .pelicula-principal .contenedor {
        margin: 5em;
        margin-bottom: 6.26em;
    }

    .pelicula-principal .titulo {
        font-weight: 600;
        font-size: 3.12em;
        margin-bottom: 0.4em;
    }

    .pelicula-principal .descripcion {
        font-weight: normal;
        font-size: 1em;
        line-height: 1.75em;
        max-width: 80%;
        margin-bottom: 1.25em;
    }

    .pelicula-principal .boton {
        background: rgba(0, 0, 0, 0.5);
        border: none;
        border-radius: 0.31em;
        padding: 0.93em 1.87em;
        color:#ffffff;
        margin-right: 1.25em;
        cursor: pointer;
        transition: 0.3s ease all;
        font-size: 1.12em; 
    }

    .pelicula-principal .boton:hover {
        background:#ffffff;
        color:#000000
    }

    .pelicula-principal .boton i {
        margin-right: 1.25em;

    }
</style>


<div class="pelicula-principal">
    <div class="contenedor">
        <div>
            <h3 class="titulo">{{ $peliculaAleatoria->titulo }}</h3>
            <div class="descripcion">{{ $peliculaAleatoria->descripcion }}</div>
            <button role="button" class="boton"><i class="fa-solid fa-play"></i>Reproducir</button>
            <button role="button" class="boton"><i class="fa-solid fa-circle-info"></i>Más información</button>
        </div>
    </div>
</div>


<script src="https://kit.fontawesome.com/be3095d6ce.js" crossorigin="anonymous"></script>
