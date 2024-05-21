<style>
    body {
        background-color: #121212;
        color: #fff;
    }

    .proyeccionpelicula {
        border: 1px solid #343a40;
        padding: 20px;
        border-radius: 5px;
        margin-bottom: 20px;
        background-color: #343a40;
        color: #fff;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s; 
    }

    .proyeccionpelicula:hover {
        transform: scale(1.1); 
    }

    .proyeccionpelicula a {
        color: #fff;
        text-decoration: none;
    }

    .proyeccionpelicula p {
        margin-bottom: 5px;
    }

    .proyeccionpelicula img {
        width: 500px;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        margin: auto;
    }

    @media (max-width: 768px) {
    .proyeccionpelicula img {
        max-width: 100%; 
        height: auto; 
        left: 400px; 
        }
    }

</style>


<body>
    <div class="container">
        <div class="proyecciones">
            <h3>Proyecciones</h3>
            <br>
            <ul class="list-group">
                @foreach($proyecciones as $proyeccion)
                <li class="list-group-item proyeccionpelicula">
                    <a href="#">
                        <img src="{{ $proyeccion->pelicula->banner }}" alt="Banner de la película">
                        <p><strong>Titulo: </strong>{{ $proyeccion->pelicula->titulo }}</p>
                        <p><strong>Sucursal: </strong> {{ $proyeccion->sala->sucursal->nombre }}</p>
                        <p><strong>Sala: </strong> {{ $proyeccion->sala->nombre }}</p>
                        <p><strong>Fecha:</strong> {{ $proyeccion->hora_inicio }}</p>
                        <p><strong>Hora:</strong> {{ $proyeccion->hora_fin }}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
</body>