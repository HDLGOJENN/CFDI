<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Si una vista no define @section('title'), se usa "CFDI" como título. --}}
    <title>@yield('title', 'CFDI')</title>
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Header / Navbar -->
    <header class="bg-blue-900 text-white px-6 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('imgs/222222.png') }}" alt="Logo" class="h-8">
            <span class="text-lg font-bold">CFDI</span>
        </div>

        <nav class="space-x-6">
            <a href="/vistageneral" class="hover:text-pink-400 font-semibold">Vista general</a>
            <a href="/usuarios" class="hover:text-pink-400">Usuarios</a>
            <a href="/cuentas" class="hover:text-pink-400">Cuentas</a>
            <a href="/analisis" class="hover:text-pink-400">Análisis</a>
        </nav>
    </header>

    <!-- Contenido dinámico -->
    {{-- @yield('content') es un espacio reservado donde cada vista pondrá su contenido.
    Es como decir: “Aquí se insertará el contenido específico de cada página”. --}}
    <main class="flex-1 p-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-200 text-center py-4 text-sm text-gray-600">
        © {{ date('Y') }} CFDI
    </footer>
</body>
</html>
