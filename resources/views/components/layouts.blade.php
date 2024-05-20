<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Cines El Chele') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #141414;
            color: #fff;
        }

        .navbar {
            background-color: #333232;
        }

        .navbar-brand, .nav-link {
            color: #fff !important;
        }

        .navbar-brand:hover, .nav-link:hover {
            color: #e50914 !important;
        }

        .navbar-toggler-icon {
            filter: invert(1);
        }

        .dropdown-menu {
            background-color: #141414;
            border: none;
        }

        .dropdown-item {
            color: #fff;
        }

        .dropdown-item:hover {
            background-color: #e50914;
            color: #fff;
        }

        header {
            background-color: #141414;
            color: #fff;
        }

        main {
            padding: 20px;
        }

        .bg-gray-100 {
            background-color: #141414 !important;
        }

        .dark\\:bg-gray-900 {
            background-color: #141414 !important;
        }

        .shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Navigation Menu -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
              
              <button class="navbar-toggler order-2 order-md-1" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse order-3 order-md-2" id="navbar-left">
                <ul class="navbar-nav me-auto">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Películas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Sucursales</a>
                  </li>
                </ul>
              </div>

              <a class="navbar-brand order-1 order-md-3" href="#">Cines El Chele</a>

              <div class="collapse navbar-collapse order-4 order-md-4" id="navbar-right">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Nosotros</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Estrenos</a>
                  </li>
                </ul>

                <!-- Auth Navigation -->
                <div>
                    @if (Route::has('login'))
                        <nav class="-mx-3 flex flex-1 justify-end">
                            @auth
                                <div class="dropdown">
                                    <a
                                        href="#"
                                        class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white dropdown-toggle"
                                        id="accountDropdown"
                                        role="button"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                    >
                                        Mi Cuenta
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                                        <li><a class="dropdown-item" href="{{ url('/profile') }}">Perfil</a></li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="dropdown-item">Cerrar Sesión</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <a
                                    href="{{ route('login') }}"
                                    class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                    Log in
                                </a>
                
                                @if (Route::has('register'))
                                    <a
                                        href="{{ route('register') }}"
                                        class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
                
                <!-- End Auth Navigation -->
              </div>
            </div>
          </nav>
    </div>

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
