<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('categoria.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Agregar Categoria</a>
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
                            $categorias = $categorias->sortBy('id');
                        @endphp

                        @foreach ($categorias as $categoria)
                            <tr>
                                <td class="py-2 px-4 text-gray-700 sm:w-20">{{ $categoria->id }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $categoria->nombre }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $categoria->descripcion }}</td>
                                <td class="py-2 px-4 text-gray-700 flex justify-center">
                                    <a href="{{ route('categoria.edit', $categoria->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-2 rounded">Editar</a>
                                    <form action="{{ route('categoria.destroy', $categoria->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-1 px-2 rounded" onclick="return confirm('¿Está seguro de que desea eliminar esta categoria?')">Eliminar</button>
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
