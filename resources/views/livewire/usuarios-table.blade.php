<div class="space-y-6">
     <h1 class="text-2xl font-bold">Usuarios</h1>
    <!-- Header con buscador y botón -->
    <div class="flex items-center justify-between">
        <div class="flex items-center w-1/3">
            <input type="text"
            {{-- conecta el input con q y espera 300ms --}}
                   wire:model.live.debounce.300ms="q"
                   placeholder="Buscar usuario"
                   class="w-full rounded-full border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <a href="#"
           class="bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition">
            Crear usuario
        </a>
    </div>

    <!-- Contador / estado -->
    <div class="text-sm text-gray-600">
        Mostrando {{ $users->total() }} resultado(s)
        @if(trim($q) !== '')
            para "<strong>{{ $q }}</strong>"
        @endif
    </div>

    <!-- Tabla -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <table class="w-full border-collapse">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="px-6 py-3 text-left">Nombre de la cuenta</th>
                    <th class="px-6 py-3 text-left">Usuario</th>
                    <th class="px-6 py-3 text-left">Nombre completo</th>
                    <th class="px-6 py-3 text-left">Último acceso</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $u)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-3">{{ $u->account->business_name ?? '—' }}</td>
                        <td class="px-6 py-3">{{ $u->username }}</td>
                        <td class="px-6 py-3">{{ $u->name }}</td>
                        <td class="px-6 py-3">
                            @if($u->last_accessed_at)
                                {{ $u->last_accessed_at->format('d/m/Y H:i') }}
                            @else
                                —
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                            No hay usuarios para mostrar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación, se genera automaticamente los botones de paginacion -->
    <div class="mt-4">
        {{ $users->links() }} {{-- Tailwind pagination --}}
    </div>

    <!--Mientras esta buscando se muestra un msj de cargando Loader cuando cambia el buscador -->
    <div wire:loading wire:target="q" class="text-gray-500">Cargando…</div>
</div>
