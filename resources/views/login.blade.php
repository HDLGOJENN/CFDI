<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CFDI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Iconos de Heroicons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body class="h-screen flex">

    <!-- Columna izquierda -->
    <div class="w-1/2 bg-[#1E2A78] flex flex-col items-center justify-center text-white">
        <!-- Logo -->
        <img src="{{ asset('imgs/222222.PNG') }}" 
     alt="Logo CFDI" class="w-32 h-32 mb-6">
        <h1 class="text-2xl font-bold">CFDI</h1>
    </div>

    <!-- Columna derecha -->
    <div class="w-1/2 flex items-center justify-center bg-gray-50">
        <div class="w-96 bg-white p-8 rounded-xl shadow-lg">
            <h2 class="text-2xl font-bold text-center mb-8 font-mono">Inicio de sesión</h2>

            <!-- Formulario -->
            <form>
                <!-- Usuario -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm mb-1">Usuario:</label>
                    <div class="flex items-center border rounded-lg bg-gray-100 px-3">
                        <input type="text" placeholder="TaeYUN"
                               class="w-full py-2 bg-gray-100 focus:outline-none">
                        <i class="ph ph-user text-gray-400"></i>
                    </div>
                </div>

                <!-- Contraseña -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm mb-1">Contraseña</label>
                    <div class="flex items-center border rounded-lg bg-gray-100 px-3">
                        <input type="password" placeholder="********"
                               class="w-full py-2 bg-gray-100 focus:outline-none">
                        <i class="ph ph-lock text-gray-400"></i>
                    </div>
                </div>

                <!-- Botón -->
                <button type="submit" 
                        class="w-full bg-[#1E2A78] text-white py-3 rounded-lg font-semibold hover:bg-[#131c4d] transition">
                    Iniciar sesión
                </button>
            </form>
        </div>
    </div>

</body>
</html>
