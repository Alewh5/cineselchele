@component('components.layouts')
<style>
    .content-wrapper {
        display: flex;
        justify-content: space-between;
    }

    .main-content {
        width: 70%;
    }

    .redes-sociales-container {
        width: 25%;
        padding: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #3d3a3a;
        border-radius: 5px;
    }

    .redes-sociales {
        display: flex;
        flex-direction: column;
    }

    .social-link {
        display: flex;
        align-items: center;
        padding: 10px;
        margin: 5px 0;
        border-radius: 5px;
        text-decoration: none;
        color: #000;
        background-color: #e0e0e0;
        transition: background-color 0.3s ease;
    }

    .social-link:hover {
        background-color: #d0d0d0;
    }

    .social-link i {
        margin-right: 10px;
    }

    .social-link.facebook {
        background-color: #3b5998;
        color: #fff;
    }

    .social-link.twitter {
        background-color: #1da1f2;
        color: #fff;
    }

    .social-link.instagram {
        background-color: #e1306c;
        color: #fff;
    }

    .social-link.tiktok {
        background-color: #000000;
        color: #fff;
    }

    .social-link.whatsapp {
        background-color: #25d366;
        color: #fff;
    }



</style>

<div class="content-wrapper">
    <div class="main-content">
        <h1>Inicio</h1>
        <br>
        <h2>Más Información</h2>
        <div class="informacion-adicional">
            <h3>Cartelera</h3>
            <p>Consulta nuestra cartelera para conocer las últimas películas disponibles en nuestras salas.</p>
            <x-recientes />
            
            <h3>Promociones</h3>
            <p>Descubre las promociones y descuentos que tenemos para ti.</p>

            <br>
            
            <h3>Ubicaciones</h3>
            <p>Encuentra la sala de cine más cercana y disfruta de una experiencia inolvidable.</p>
            <p>Puedes visitar alguna de nuestras <a href="{{ route('viewuser.sucursales') }}">Sucursales</a> y te atenderemos con gusto.</p>
            <br>
            
            <h3>Contacto</h3>
            <p>¿Tienes alguna duda? <a href="{{ url('/nosotros') }}">Contáctanos</a> y te atenderemos con gusto.</p>
        </div>
    </div>

    <div class="redes-sociales-container">
        <h2>Síguenos en Redes Sociales</h2>
        <br>
        <div class="redes-sociales">
            <a href="https://facebook.com/cineselchele" target="_blank" class="social-link facebook">
                <i class="fab fa-facebook fa-2x"></i> Facebook
            </a>
            <a href="https://twitter.com/cineselchele" target="_blank" class="social-link twitter">
                <i class="fab fa-twitter fa-2x"></i> Twitter
            </a>
            <a href="https://instagram.com/cineselchele" target="_blank" class="social-link instagram">
                <i class="fab fa-instagram fa-2x"></i> Instagram
            </a>
            <a href="https://tiktok.com/@cineselchele" target="_blank" class="social-link tiktok">
                <i class="fab fa-tiktok fa-2x"></i> TikTok
            </a>
            <a href="https://wa.me/1234567890" target="_blank" class="social-link whatsapp">
                <i class="fab fa-whatsapp fa-2x"></i> WhatsApp
            </a>
        </div>
    </div>
</div>

@endcomponent
