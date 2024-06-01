<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">Agregar Empleado</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('empleado.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="ci" class="block text-gray-700 text-sm font-bold mb-2">Cédula:</label>
                        <input type="text" name="ci" class="form-input rounded-md shadow-sm w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                        <input type="text" name="nombre" class="form-input rounded-md shadow-sm w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="direccion" class="block text-gray-700 text-sm font-bold mb-2">Dirección:</label>
                        <input type="text" name="direccion" class="form-input rounded-md shadow-sm w-full">
                    </div>
                    <div class="mb-4">
                        <label for="telefono" class="block text-gray-700 text-sm font-bold mb-2">Teléfono:</label>
                        <input type="text" name="telefono" class="form-input rounded-md shadow-sm w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="sexo" class="block text-gray-700 text-sm font-bold mb-2">Sexo:</label>
                        <select name="sexo" class="form-select rounded-md shadow-sm w-full" required>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

