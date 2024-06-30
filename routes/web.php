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
        
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

        Route::delete('admin/sucursal/{id}', [SucursalController::class, 'destroy'])->name('sucursales.destroy');
        Route::get('admin/sucursal/create', [SucursalController::class, 'create'])->name('sucursales.create');
        Route::post('admin/sucursal', [SucursalController::class, 'store'])->name('sucursales.store');
        Route::post('admin/salas', [SalaController::class, 'store'])->name('salas.store');
        Route::get('admin/salas/create', [SalaController::class, 'create'])->name('salas.create');
        Route::delete('admin/salas/{id}', [SalaController::class, 'destroy'])->name('salas.destroy');
        Route::get('admin/users', [UserController::class, 'index'])->name('usuarios.index');
        Route::get('admin/users/create', [UserController::class, 'create'])->name('usuarios.create');
        Route::get('admin/users/{id}', [UserController::class, 'show'])->name('usuarios.show');
        Route::get('admin/users/{id}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
        
        Route::delete('admin/users/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');
        Route::put('admin/users/{id}', [UserController::class, 'update'])->name('usuarios.update');
        Route::get('/admin/profile', [UserController::class, 'profilead'])->name('usuarios.profile');
        
        
        
    });

    Route::group(['middleware' => ['auth', 'mod']], function () {

        Route::get('/xadmin', [AdminController::class, 'index'])->name('admin.index');

        // Rutas para Sucursales MOD
        Route::get('admin/sucursal', [SucursalController::class, 'index'])->name('sucursales.index');
        Route::get('admin/sucursal/{sucursal}', [SucursalController::class, 'show'])->name('sucursal.show');

        // Rutas para Salas MOD
        Route::get('admin/salas/{slug}', [SalaController::class, 'show'])->name('salas.show');

        // Rutas para Proyecciones
        Route::get('admin/proyecciones/create/{sala_id}', [ProyeccionController::class, 'create'])->name('proyecciones.create');
        Route::post('admin/proyeccion', [ProyeccionController::class, 'store'])->name('proyecciones.store');
        Route::get('admin/proyeccion/{id}', [ProyeccionController::class, 'show'])->name('proyecciones.show');
        Route::delete('admin/proyecciones/{id}', [ProyeccionController::class, 'destroy'])->name('proyecciones.destroy');

        // Ruta para listar Películas
        Route::delete('admin/pelicula/{id}', [PeliculaController::class, 'destroy'])->name('peliculas.destroy');
        Route::get('admin/pelicula', [PeliculaController::class, 'index'])->name('peliculas.index');
        Route::get('admin/pelicula/create', [PeliculaController::class, 'create'])->name('peliculas.create');
        Route::get('admin/pelicula/{id}', [PeliculaController::class, 'show'])->name('peliculas.show');
        Route::get('admin/pelicula/{id}/edit', [PeliculaController::class, 'edit'])->name('peliculas.edit');
        Route::post('admin/pelicula', [PeliculaController::class, 'store'])->name('peliculas.store');
        Route::put('admin/pelicula/{id}', [PeliculaController::class, 'update'])->name('peliculas.update');

        // Ruta para los asientos
        Route::get('admin/asientos', [AsientoController::class, 'show'])->name('asientos.show');
        Route::post('admin/asientos/{id}/reservar', [AsientoController::class, 'reservar'])->name('asientos.reservar');
        Route::delete('admin/reserva/{id}', [ReservaController::class, 'destroy'])->name('reserva.destroy');
        Route::get('admin/reservas/create', [ReservaController::class, 'create'])->name('reserva.create');
        Route::post('admin/reservas', [ReservaController::class, 'store'])->name('reserva.store');


    });

});

Route::get('/inicio', [ViewUserController::class, 'inicio'])->name('viewuser.inicio');
Route::get('/nosotros', [ViewUserController::class, 'nosotros'])->name('viewuser.nosotros');
Route::get('/proyecciones', [ViewUserController::class, 'proyeccion'])->name('viewuser.proyeccion');
Route::get('/sucursales', [ViewUserController::class, 'sucursales'])->name('viewuser.sucursales');




