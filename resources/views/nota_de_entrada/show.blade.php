<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">Nota de Entrada Nro. {{ $notaDeEntrada->id }}</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3>Número: {{ $notaDeEntrada->numero }}</h3>
                <h3>Proveedor: {{ $notaDeEntrada->proveedor }}</h3>
                <h3>Fecha: {{ $notaDeEntrada->fecha }}</h3>
                <h3>Total: {{ $notaDeEntrada->total }}</h3>

                <!-- Botón de impresión -->
                <button onclick="window.print()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                    Imprimir
                </button>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex">
                <h3 class="mb-5 inline"><b>Detalles de Nota de Entrada </b></h3>
            </div>
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-left py-2 px-4 text-gray-700">Producto</th>
                        <th class="text-left py-2 px-4 text-gray-700">Nombre</th>
                        <th class="text-left py-2 px-4 text-gray-700">Cantidad</th>
                        <th class="text-left py-2 px-4 text-gray-700">Precio</th>
                        <th class="text-left py-2 px-4 text-gray-700">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @if ($notaDeEntrada->detalleDeEntrada != null)
                        @foreach ($notaDeEntrada->detalleDeEntrada as $fila)
                            <tr>
                                <td class="py-2 px-4 text-gray-700 sm:w-20">{{ $fila->producto }}</td>
                                <td class="py-2 px-4 text-gray-700 sm:w-20">{{ $fila->product->nombre }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $fila->cantidad }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $fila->precio }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $fila->total }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
