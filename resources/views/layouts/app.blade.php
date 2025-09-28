<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CFDI')</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Favicon -->
<link rel="icon" href="{{ asset('imgs/222222.png') }}" type="image/png">
<link rel="shortcut icon" href="{{ asset('imgs/222222.png') }}" type="image/png">
<link rel="apple-touch-icon" href="{{ asset('imgs/222222.png') }}">

    {{-- Livewire --}}
    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Header / Navbar -->
    <header class="bg-blue-900 text-white px-6 py-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('imgs/222222.png') }}" alt="Logo" class="h-8">
                <span class="text-lg font-bold">CFDI</span>
            </div>

            <nav class="flex items-center gap-6">
                @auth
                    <a href="{{ route('vistageneral') }}" class="hover:text-pink-400 font-semibold">Vista general</a>
                    <a href="{{ route('usuarios') }}" class="hover:text-pink-400">Usuarios</a>
                    <a href="{{ route('cuentas') }}" class="hover:text-pink-400">Cuentas</a>
                    <a href="{{ route('analisis') }}" class="hover:text-pink-400">Análisis</a>

                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button class="ml-4 text-white/80 hover:text-white text-sm">Salir</button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="hover:text-pink-400 font-semibold">Iniciar sesión</a>
                @endguest
            </nav>
        </div>
    </header>

    <!-- Contenido -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-200 text-center py-4 text-sm text-gray-600">
        © {{ date('Y') }} CFDI
    </footer>

    {{-- Livewire --}}
    @livewireScripts
</body>
</html>
