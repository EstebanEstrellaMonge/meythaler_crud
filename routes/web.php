<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CasoController;

Route::get('/', function () {
    return redirect()->route('usuarios.index');
});

// Rutas de Usuarios
Route::resource('usuarios', UsuarioController::class);

// Rutas de Casos
Route::resource('casos', CasoController::class);

Route::post('/casos', [CasoController::class, 'store'])->name('casos.store');