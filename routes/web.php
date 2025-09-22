<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Rutas para login
Route::get('/login', function () {
    return view('login');
});

// Ruta para vista general
Route::get('/vistageneral', function () {
    return view('vistageneral'); // busca en resources/views/dashboard.blade.php
});

// Ruta para usuarios
Route::get('/usuarios', function () {
    return view('usuarios'); // busca en resources/views/dashboard.blade.php
});

// Ruta para cuentas
Route::get('/cuentas', function () {
    return view('cuentas'); // busca en resources/views/dashboard.blade.php
});

// Ruta para analisis
Route::get('/analisis', function () {
    return view('analisis'); // busca en resources/views/dashboard.blade.php
});

