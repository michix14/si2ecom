<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('marca.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Agregar Marca</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left py-2 px-4 text-gray-700 sm:w-20">ID</th>
                            <th class="text-left py-2 px-4 text-gray-700">NOMBRE</th>
                            <th class="text-left py-2 px-4 text-gray-700">DESCRIPCION</th>
                            <th class="text-left py-2 px-4 text-gray-700">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @php
                            $marcas = $marcas->sortBy('id');
                        @endphp

                        @foreach ($marcas as $marca)
                            <tr>
                                <td class="py-2 px-4 text-gray-700 sm:w-20">{{ $marca->id }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $marca->nombre }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $marca->descripcion }}</td>
                                <td class="py-2 px-4 text-gray-700 flex justify-center">
                                    <a href="{{ route('marca.edit', $marca->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-2 rounded">Editar</a>
                                    <form action="{{ route('marca.destroy', $marca->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-1 px-2 rounded" onclick="return confirm('¿Está seguro de que desea eliminar esta marca?')">Eliminar</button>
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
