<div class="space-y-6">
    <h1 class="text-2xl font-bold">Vista General</h1>
        <!-- Buscador -->
       <div class="mb-3 flex items-center gap-2">
        {{-- wire:model.live.debounce.300ms="q" → vincula el input con la propiedad $q.
        .live → hace que Livewire actualice el backend en vivo.
        .debounce.300ms → espera 300ms después de dejar de escribir para mandar el valor (optimiza peticiones). --}}
            <input type="text"
                   wire:model.live.debounce.300ms="q"
                   placeholder="Buscar cuenta..."
                   class="border rounded px-3 py-2 w-full" />

            <!-- Botón limpiar -->
            @if($q !== '')
                <button type="button" wire:click="$set('q','')" class="border rounded px-3 py-2">
                    Limpiar
                </button>
            @endif
        </div>
    <div class="bg-white rounded-2xl shadow-md p-4">
        <h3 class="text-lg font-semibold mb-2">Datos de cuentas</h3>



        <!-- Estado de carga SOLO cuando cambia 'q' -->
        <div class="flex items-center gap-2 text-gray-500 mb-2"
        {{-- Muestra un texto de “Cargando…” mientras Livewire procesa cambios de $q --}}
             wire:loading
             wire:target="q">
            <span class="animate-pulse">Cargando…</span>
        </div>

        <!-- Contador (en vivo) -->
        <div class="text-sm text-gray-600 mb-3">
            {{-- Muestra cuántas cuentas están en $cuentas. --}}
            Mostrando {{ count($cuentas) }} cuenta(s)
            @if(trim($q) !== '')
                para "<strong>{{ $q }}</strong>"
            @endif
        </div>

        <div class="overflow-x-auto" wire:loading.remove wire:target="q">
            @if(empty($cuentas))
                <p class="text-gray-500">No hay datos</p>
            @else
                <table class="w-full text-left border-collapse">
                    <thead class="bg-blue-900 text-white">
                        <tr>
                            <th class="px-4 py-2">Nombre de la cuenta</th>
                            <th class="px-4 py-2">Número de usuarios</th>
                            <th class="px-4 py-2">Nivel de cuenta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cuentas as $c)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2 font-medium">{{ $c['nombre'] }}</td>
                                <td class="px-4 py-2">{{ $c['usuarios'] }}</td>
                                <td class="px-4 py-2">{{ $c['nivel'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-md p-6">
        <h3 class="text-lg font-semibold mb-4 text-center">Gráficas</h3>
        <p class="text-center text-gray-500 py-6">No hay datos</p>
    </div>
</div>
