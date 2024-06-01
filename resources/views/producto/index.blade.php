<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('producto.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Agregar Producto</a>
        <a href="{{ route('productos.exportarExcel') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Generar Reporte</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left py-2 px-4 text-gray-700 sm:w-20">ID</th>
                            <th class="text-left py-2 px-4 text-gray-700">NOMBRE</th>
                            <th class="text-left py-2 px-4 text-gray-700">IMAGEN</th>
                            <th class="text-left py-2 px-4 text-gray-700">STOCK</th>
                            <th class="text-left py-2 px-4 text-gray-700">DESCRIPCION</th>
                            <th class="text-left py-2 px-4 text-gray-700">PRECIO VENTA</th>
                            <th class="text-left py-2 px-4 text-gray-700">CATEGORIA</th>
                            <th class="text-left py-2 px-4 text-gray-700">MARCA</th>
                            <th class="text-left py-2 px-4 text-gray-700">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @php
                            $productos = $productos->sortBy('id');
                        @endphp

                        @foreach ($productos as $producto)
                            <tr>
                                <td class="py-2 px-4 text-gray-700 sm:w-20">{{ $producto->id }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $producto->nombre }}</td>
                                <td class="py-2 px-4 text-gray-700"><center><img class="imagen-producto" src="{{ asset($producto->imagen_url) }}" alt=""></center></td>
                                <td class="py-2 px-4 text-gray-700">{{ $producto->stock }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $producto->descripcion }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $producto->precioventa }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $producto->categorias->nombre }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $producto->marcas->nombre }}</td>
                                <td class="py-2 px-4 text-gray-700">
                                   <a href="{{ route('producto.edit', $producto->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-2 rounded">Editar</a>
                                    <form action="{{ route('producto.destroy', $producto->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-1 px-2 rounded" onclick="return confirm('¿Está seguro de que desea eliminar este producto?')">Eliminar</button>
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
