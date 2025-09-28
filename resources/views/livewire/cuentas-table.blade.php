<div class="space-y-6">

    <!-- Header con buscador y botón -->
    <div class="flex items-center justify-between">
        <div class="flex items-center w-1/3">
            <input type="text"
                   wire:model.live.debounce.300ms="q"
                   placeholder="Buscar cuenta, correo o madre…"
                   class="w-full rounded-full border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <a href="#"
           class="bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition">
            Crear cuenta
        </a>
    </div>

    <!-- Estado -->
    <div class="text-sm text-gray-600">
        Mostrando {{ $accounts->total() }} resultado(s)
        @if(trim($q) !== '')
            para "<strong>{{ $q }}</strong>"
        @endif
    </div>

    <!-- Tabla -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <table class="w-full border-collapse">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="px-6 py-3 text-left">ID</th>
                    <th class="px-6 py-3 text-left">Cuenta madre</th>
                    <th class="px-6 py-3 text-left">Nombre de la cuenta</th>
                    <th class="px-6 py-3 text-left">Correo</th>
                    <th class="px-6 py-3 text-left">Fecha de creación</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($accounts as $a)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-3">{{ $a->id }}</td>
                        <td class="px-6 py-3">{{ $a->parent->business_name ?? '—' }}</td>
                        <td class="px-6 py-3">{{ $a->business_name }}</td>
                        <td class="px-6 py-3">{{ $a->email ?? '—' }}</td>
                        <td class="px-6 py-3">{{ optional($a->created_at)->format('d/m/Y') ?? '—' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-6 text-center text-gray-500">
                            No hay cuentas para mostrar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $accounts->links() }}
    </div>

    <!-- Loader durante la búsqueda -->
    <div wire:loading wire:target="q" class="text-gray-500">Cargando…</div>
</div>
