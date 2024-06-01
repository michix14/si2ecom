<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex justify-between">
                <h3 class="mb-5 inline"><b>Detalles de Nota de Entrada </b></h3>
                <h3 class="mb-5 inline"><b>Total: {{ $total }}</b></h3>
            </div>
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-left py-2 px-4 text-gray-700">Nombre</th>
                        {{-- <th class="text-left py-2 px-4 text-gray-700">Imagen</th> --}}
                        <th class="text-left py-2 px-4 text-gray-700">Cantidad</th>
                        <th class="text-left py-2 px-4 text-gray-700">Descripción</th>
                        <th class="text-left py-2 px-4 text-gray-700">Precio</th>
                        <th class="text-left py-2 px-4 text-gray-700">Marca</th>
                        <th class="text-left py-2 px-4 text-gray-700">Categoría</th>
                        <th class="text-left py-2 px-4 text-gray-700">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @if ($filas != null)
                        @foreach ($filas as $fila)
                            <tr>
                                <td class="py-2 px-4 text-gray-700 sm:w-20">{{ $fila['nombre'] }}</td>
                                {{-- <td class="py-2 px-4 text-gray-700 sm:w-20">
                                    <img src="{{ $fila['imagen_url'] }}" alt="{{ $fila['nombre'] }}">
                                </td> --}}
                                <td class="py-2 px-4 text-gray-700">{{ $fila['stock'] }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $fila['descripcion'] }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $fila['precioventa'] }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $fila['id_marca'] }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $fila['id_categoria'] }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $fila['subtotal'] }}</td>
                                <td class="py-2 px-4 text-gray-700 flex justify-center">
                                    <button wire:click="editar({{ $loop->index }})" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-2 rounded" title="Editar">
                                        Editar
                                    </button>
                                    <button wire:click="eliminar({{ $loop->index }})" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-1 px-2 rounded" onclick="return confirm('¿Está seguro de que desea quitar este detalle de la Nota de Entrada?')" title="Eliminar"> 
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>