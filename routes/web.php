<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\ProyeccionController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\AsientoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewUserController;
use Illuminate\Contracts\View\View;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',])->group(function () {
    

    Route::group(['middleware' => ['auth', 'admin']], function () {
        Route::resource('horarios', 'HorarioController');
        Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
        Route::delete('/sucursal/{id}', [SucursalController::class, 'destroy'])->name('sucursales.destroy');
        Route::get('/sucursal/create', [SucursalController::class, 'create'])->name('sucursales.create');
        Route::post('/sucursal', [SucursalController::class, 'store'])->name('sucursales.store');
        Route::post('/salas', [SalaController::class, 'store'])->name('salas.store');
        Route::get('/salas/create', [SalaController::class, 'create'])->name('salas.create');
        Route::delete('/salas/{id}', [SalaController::class, 'destroy'])->name('salas.destroy');
        Route::get('/users', [UserController::class, 'index'])->name('usuarios.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('usuarios.create');
        Route::get('/users/{id}', [UserController::class, 'show'])->name('usuarios.show');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
        
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');
        Route::put('users/{id}', [UserController::class, 'update'])->name('usuarios.update');
        
        
        
    });

    Route::group(['middleware' => ['auth', 'mod', 'admin']], function () {

        Route::get('admin', [AdminController::class, 'index'])->name('admin.index');

        // Rutas para Sucursales MOD
        Route::get('/sucursal', [SucursalController::class, 'index'])->name('sucursales.index');
        Route::get('/sucursal/{sucursal}', [SucursalController::class, 'show'])->name('sucursal.show');

        // Rutas para Salas MOD
        Route::get('/salas/{slug}', [SalaController::class, 'show'])->name('salas.show');

        // Rutas para Proyecciones
        Route::get('/proyecciones/create/{sala_id}', [ProyeccionController::class, 'create'])->name('proyecciones.create');
        Route::post('/proyeccion', [ProyeccionController::class, 'store'])->name('proyecciones.store');
        Route::get('/proyeccion/{id}', [ProyeccionController::class, 'show'])->name('proyecciones.show');
        Route::delete('/proyecciones/{id}', [ProyeccionController::class, 'destroy'])->name('proyecciones.destroy');

        // Ruta para listar Películas
        Route::delete('/pelicula/{id}', [PeliculaController::class, 'destroy'])->name('peliculas.destroy');
        Route::get('/pelicula', [PeliculaController::class, 'index'])->name('peliculas.index');
        Route::get('/pelicula/create', [PeliculaController::class, 'create'])->name('peliculas.create');
        Route::get('/pelicula/{id}', [PeliculaController::class, 'show'])->name('peliculas.show');
        Route::get('pelicula/{id}/edit', [PeliculaController::class, 'edit'])->name('peliculas.edit');
        Route::post('/pelicula', [PeliculaController::class, 'store'])->name('peliculas.store');
        Route::put('pelicula/{id}', [PeliculaController::class, 'update'])->name('peliculas.update');

        // Ruta para los asientos
        Route::get('/asientos', [AsientoController::class, 'show'])->name('asientos.show');
        Route::post('/asientos/{id}/reservar', [AsientoController::class, 'reservar'])->name('asientos.reservar');
        Route::delete('reserva/{id}', [ReservaController::class, 'destroy'])->name('reserva.destroy');
        Route::get('/reservas/create', [ReservaController::class, 'create'])->name('reserva.create');
        Route::post('/reservas', [ReservaController::class, 'store'])->name('reserva.store');


    });

});

Route::get('/inicio', [ViewUserController::class, 'inicio'])->name('viewuser.inicio');
Route::get('/nosotros', [ViewUserController::class, 'nosotros'])->name('viewuser.nosotros');
Route::get('/proyecciones', [ViewUserController::class, 'proyeccion'])->name('viewuser.proyeccion');
Route::get('/sucursales', [ViewUserController::class, 'sucursales'])->name('viewuser.sucursales');


