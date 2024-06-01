<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">Detalles del Empleado</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Cédula:</label>
                    <p class="text-gray-900">{{ $empleado->ci }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                    <p class="text-gray-900">{{ $empleado->nombre }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Dirección:</label>
                    <p class="text-gray-900">{{ $empleado->direccion ?: 'N/A' }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Teléfono:</label>
                    <p class="text-gray-900">{{ $empleado->telefono }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Sexo:</label>
                    <p class="text-gray-900">{{ $empleado->sexo }}</p>
                </div>
                <div class="mt-4">
                    <a href="{{ route('empleado.edit', $empleado->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Editar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
