@extends('layouts.app')

@section('title', 'Cuentas')

@section('content')

  <!-- Header con buscador y botón -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center w-1/3">
            <input type="text" placeholder="Buscar usuario"
                class="w-full rounded-full border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <a href="#"
           class="bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition">
            Crear cuenta
        </a>
    </div>

    <!-- Tabla -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <table class="w-full border-collapse">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="px-6 py-3 text-left">ID</th>
                    <th class="px-6 py-3 text-left">Nombre de la cuenta madre</th>
                    <th class="px-6 py-3 text-left">Nombre de la cuenta</th>
                    <th class="px-6 py-3 text-left">Correo</th>
                    <th class="px-6 py-3 text-left">Fecha de creacion</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-3">1</td>
                    <td class="px-6 py-3">Nam</td>
                    <td class="px-6 py-3">Cuenta 1</td>
                    <td class="px-6 py-3">jenn@correo.com</td>
                    <td class="px-6 py-3"> 03/07/2025</td>
                   
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="flex justify-center mt-6 space-x-2">
        <button class="px-3 py-1 border rounded-lg hover:bg-gray-200">&lt; Back</button>
        <button class="px-3 py-1 border rounded-lg">1</button>
        <button class="px-3 py-1 border rounded-lg bg-blue-900 text-white">2</button>
        <button class="px-3 py-1 border rounded-lg">3</button>
        <button class="px-3 py-1 border rounded-lg">4</button>
        <button class="px-3 py-1 border rounded-lg">5</button>
        <button class="px-3 py-1 border rounded-lg hover:bg-gray-200">Next &gt;</button>
    </div>

@endsection