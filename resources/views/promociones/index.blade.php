<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('promociones.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Agregar Promoción</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left py-2 px-4 text-gray-700 sm:w-20">ID</th>
                            <th class="text-left py-2 px-4 text-gray-700">Producto</th>
                            <th class="text-left py-2 px-4 text-gray-700">Precio Descuento</th>
                            <th class="text-left py-2 px-4 text-gray-700">Fecha Inicio</th>
                            <th class="text-left py-2 px-4 text-gray-700">Fecha Fin</th>
                            <th class="text-left py-2 px-4 text-gray-700">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @php
                            $promociones = $promociones->sortBy('id');
                        @endphp

                        @foreach ($promociones as $promocion)
                            <tr>
                                <td class="py-2 px-4 text-gray-700 sm:w-20">{{ $promocion->id }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $promocion->producto->nombre }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $promocion->precio_descuento }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $promocion->fecha_inicio }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $promocion->fecha_fin }}</td>
                                <td class="py-2 px-4 text-gray-700">
                                    <a href="{{ route('promociones.edit', $promocion->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-2 rounded">Editar</a>
                                    <form action="{{ route('promociones.destroy', $promocion->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-1 px-2 rounded" onclick="return confirm('¿Está seguro de que desea eliminar esta promoción?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>