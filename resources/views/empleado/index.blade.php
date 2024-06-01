<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">Lista de Empleados</h1>
        <br/>
        <a href="{{ route('empleado.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Agregar Empleado</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left py-2 px-4 text-gray-700 sm:w-20">Cédula</th>
                            <th class="text-left py-2 px-4 text-gray-700">Nombre</th>
                            <th class="text-left py-2 px-4 text-gray-700">Dirección</th>
                            <th class="text-left py-2 px-4 text-gray-700">Teléfono</th>
                            <th class="text-left py-2 px-4 text-gray-700">Sexo</th>
                            <th class="text-left py-2 px-4 text-gray-700">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($empleados as $empleado)
                            <tr>
                                <td class="py-2 px-4 text-gray-700 sm:w-20">{{ $empleado->ci }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $empleado->nombre }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $empleado->direccion }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $empleado->telefono }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $empleado->sexo }}</td>
                                <td class="py-2 px-4 text-gray-700 flex justify-center">
                                    <a href="{{ route('empleado.edit', $empleado->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-2 rounded">Editar</a>
                                    <form action="{{ route('empleado.destroy', $empleado->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-1 px-2 rounded" onclick="return confirm('¿Estás seguro de eliminar este empleado?')">Eliminar</button>
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

