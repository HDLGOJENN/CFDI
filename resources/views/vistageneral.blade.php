{{-- Indica que esta vista hereda del layout app.blade.php. --}}
@extends('layouts.app')

{{-- Define el título que aparecerá en la pestaña del navegador --}}
@section('title', 'Vista General')

{{-- Aquí empieza la sección de contenido, que se insertará en el @yield('content') del layout. --}}
@section('content')
    <h1 class="text-2xl font-bold mb-6">Vista General</h1>

    <!-- Tabla de cuentas -->
    <div class="bg-white rounded-2xl shadow-md p-4 mb-8">
        <h3 class="text-lg font-semibold mb-4">Datos de cuentas</h3>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-blue-900 text-white">
                    <tr>
                        <th class="px-4 py-2">Nombre de la cuenta</th>
                        <th class="px-4 py-2">Número de usuarios</th>
                        <th class="px-4 py-2">Nivel de cuenta</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2 font-medium">Empresa Alpha</td>
                        <td class="px-4 py-2">15</td>
                        <td class="px-4 py-2">Premium</td>
                    </tr>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2 font-medium">Comercial Beta</td>
                        <td class="px-4 py-2">8</td>
                        <td class="px-4 py-2">Básica</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 font-medium">Servicios Gamma</td>
                        <td class="px-4 py-2">23</td>
                        <td class="px-4 py-2">Avanzada</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Placeholder de gráfica -->
    <div class="bg-white rounded-2xl shadow-md p-6">
        <h3 class="text-lg font-semibold mb-4 text-center">Gráficas</h3>
        <p class="text-center text-gray-500 py-6">No hay datos</p>
    </div>
@endsection
