<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

// Redirigir la raíz directamente al login
Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('vistageneral')
        : redirect()->route('login');
});

Route::middleware(['guest', 'prevent-back-history'])->group(function () {
// Ruta para mostrar el formulario de login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Ruta para procesar el login
Route::post('/login', [AuthController::class, 'login']) ->name('login.attempt');

});
// Ruta para logout


// Grupo de rutas protegidas (requieren autenticación)
Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('prevent-back-history');
    
    // Ruta principal después del login
    Route::get('/vistageneral', function () {
        return view('vistageneral');
    })->name('vistageneral');
    
    // Resto de rutas protegidas
    Route::get('/usuarios', function () {
        return view('usuarios');
    })->name('usuarios');
    
    Route::get('/cuentas', function () {
        return view('cuentas');
    })->name('cuentas');
    
    Route::get('/analisis', function () {
        return view('analisis');
    })->name('analisis');
});