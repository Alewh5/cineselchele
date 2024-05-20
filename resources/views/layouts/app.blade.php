<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    
    .saladiv {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); 
  gap: 10px; 

 .asientosdiv {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100px; 
    background-color: #f0f0f0; 
    border: 1px solid #ccc; 
    border-radius: 10px; 
    font-size: 1.2rem; 
    text-decoration: none; 

    &:hover {
      background-color: #ddd; 
    }
  }
}

</style>    
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Navigation Menu - Aquí puede ir tu menú de navegación -->

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
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
