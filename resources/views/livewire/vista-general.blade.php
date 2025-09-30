<div class="space-y-6">
    <h1 class="text-2xl font-bold">Vista General</h1>

    <div class="bg-white rounded-2xl shadow-md p-4">
        <h3 class="text-lg font-semibold mb-4">Mi cuenta</h3>

        <div class="overflow-x-auto">
            @if(empty($cuentas))
                <p class="text-gray-500">No hay datos</p>
            @else
                <table class="w-full text-left border-collapse">
                    <thead class="bg-blue-900 text-white">
                        <tr>
                            <th class="px-4 py-2">Nombre de la cuenta</th>
                            <th class="px-4 py-2">Total de usuarios</th>
                            <th class="px-4 py-2">Total de subcuentas</th>
                            <th class="px-4 py-2">Nivel análisis</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cuentas as $c)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2 font-medium">{{ $c['nombre'] }}</td>
                                <td class="px-4 py-2">{{ $c['usuarios'] }}</td>
                                <td class="px-4 py-2">{{ $c['subcuentas'] }}</td>
                                <td class="px-4 py-2">{{ $c['tipo_cuenta'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <div class="mt-6">
            <p class="text-sm text-gray-600 mb-2">Tipo de cuenta: {{ $c['nivel'] }}</p>
        </div>
    </div>

    <div class="bg-gray-100 rounded-2xl shadow-md p-6">
        <h3 class="text-lg font-semibold mb-4 text-center">GRÁFICAS</h3>
    </div>
</div>