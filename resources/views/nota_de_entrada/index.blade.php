<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">Notas de Entrada</h1>
        <br/>
        <a href="{{ route('nota-de-entrada.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Agregar Nota de Entrada</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left py-2 px-4 text-gray-700 sm:w-20">ID</th>
                            <th class="text-left py-2 px-4 text-gray-700">Numero</th>
                            <th class="text-left py-2 px-4 text-gray-700">Fecha</th>
                            <th class="text-left py-2 px-4 text-gray-700">Proveedor</th>
                            <th class="text-left py-2 px-4 text-gray-700">Total</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @php
                            if ($notasDeEntrada->count() > 0)
                                $notasDeEntrada = $notasDeEntrada->sortBy('fecha');
                        @endphp

                        @foreach ($notasDeEntrada as $notaDeEntrada)
                            <tr>
                                <td class="py-2 px-4 text-gray-700 sm:w-20">{{ $notaDeEntrada->id }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $notaDeEntrada->numero }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $notaDeEntrada->fecha }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $notaDeEntrada->proveedor }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $notaDeEntrada->total }}</td>

                                <td class="py-2 px-4 text-gray-700 flex justify-center">
                                    <a href="{{ route('nota-de-entrada.show', $notaDeEntrada) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-2 rounded">Mostrar</a>
                                    <form action="{{ route('nota-de-entrada.destroy', $notaDeEntrada) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-1 px-2 rounded" onclick="return confirm('¿Está seguro de que desea eliminar esta Nota de Entrada?')">Eliminar</button>
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