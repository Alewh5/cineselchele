<style>
    .recent-movies-container li {
        position: relative;
    }

    .recent-movies-container li::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.5) 100%);
        background-size: cover;
        background-position: center;
        z-index: 1;
        border-radius: 10px;
        filter: brightness(80%) contrast(120%);
    }

    .recent-movies-container li h2 {
        position: relative;
        z-index: 2;
        color: white;
        font-size: 24px;
    }

    .carousel-container {
        width: 100%;
        overflow: hidden;
    }

    .recent-movies-container {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
    }

    .recent-movies-container li {
        background-size: cover;
        background-position: center;
        width: 900px;
        height: 300px;
        margin-right: 20px;
        color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    @media screen and (max-width: 800px) {
        .recent-movies-container li {
            margin-right: 10px;
        }
    }
</style>

<div class="carousel-container">
    <ul class="recent-movies-container">
        @foreach($peliculas as $pelicula)
            <li style="background-image: url('{{ $pelicula->banner }}');">
                <h2>{{ $pelicula->titulo }}</h2>
            </li>
        @endforeach
    </ul>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    $(document).ready(function(){
        $('.recent-movies-container').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            prevArrow: '<button type="button" class="slick-prev">Previous</button>',
            nextArrow: '<button type="button" class="slick-next">Next</button>',
            responsive: [
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    });
</script>
