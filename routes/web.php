<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\ProyeccionController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\AsientoController;
use App\Http\Controllers\ReservaController;

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

        // Rutas para Sucursales
        Route::delete('/sucursales/{id}', [SucursalController::class, 'destroy'])->name('sucursales.destroy');
        
        Route::get('/sucursales/create', [SucursalController::class, 'create'])->name('sucursales.create');
        Route::post('/sucursales', [SucursalController::class, 'store'])->name('sucursales.store');
        

        // Rutas para Salas
        Route::post('/salas', [SalaController::class, 'store'])->name('salas.store');
        Route::get('/salas/create', [SalaController::class, 'create'])->name('salas.create');
        
        Route::delete('/salas/{id}', [SalaController::class, 'destroy'])->name('salas.destroy');
        // Route::get('/salas/{id}/edit', [SalaController::class, 'store'])->name('salas.store');

        
        
    });

    Route::group(['middleware' => ['auth', 'mod']], function () {

        Route::get('admin', [AdminController::class, 'index'])->name('admin.index');

        // Rutas para Sucursales MOD
        Route::get('/sucursales', [SucursalController::class, 'index'])->name('sucursales.index');
        Route::get('/sucursales/{sucursal}', [SucursalController::class, 'show'])->name('sucursal.show');

        // Rutas para Salas MOD
        Route::get('/salas/{slug}', [SalaController::class, 'show'])->name('salas.show');

        // Rutas para Proyecciones
        Route::get('/proyecciones/create/{sala_id}', [ProyeccionController::class, 'create'])->name('proyecciones.create');
        Route::post('/proyecciones', [ProyeccionController::class, 'store'])->name('proyecciones.store');
        Route::get('/proyecciones/{id}', [ProyeccionController::class, 'show'])->name('proyecciones.show');
        Route::delete('/proyecciones/{id}', [ProyeccionController::class, 'destroy'])->name('proyecciones.destroy');

        // Ruta para listar Películas
        Route::delete('/peliculas/{id}', [PeliculaController::class, 'destroy'])->name('peliculas.destroy');
        Route::get('/peliculas', [PeliculaController::class, 'index'])->name('peliculas.index');
        Route::get('/peliculas/create', [PeliculaController::class, 'create'])->name('peliculas.create');
        Route::get('/peliculas/{id}', [PeliculaController::class, 'show'])->name('peliculas.show');
        Route::get('peliculas/{id}/edit', [PeliculaController::class, 'edit'])->name('peliculas.edit');
        Route::post('/peliculas', [PeliculaController::class, 'store'])->name('peliculas.store');
        Route::put('peliculas/{id}', [PeliculaController::class, 'update'])->name('peliculas.update');

        // Ruta para los asientos
        Route::get('/asientos', [AsientoController::class, 'show'])->name('asientos.show');
        Route::post('/asientos/{id}/reservar', [AsientoController::class, 'reservar'])->name('asientos.reservar');
        Route::delete('reserva/{id}', [ReservaController::class, 'destroy'])->name('reserva.destroy');
        Route::get('/reservas/create', [ReservaController::class, 'create'])->name('reserva.create');
        Route::post('/reservas', [ReservaController::class, 'store'])->name('reserva.store');


    });

});


