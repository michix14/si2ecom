<<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">Editar Empleado</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('empleado.update', $empleado) }}" method="POST">
                    @method("PUT")
                    @csrf

                    <div class="mb-4">
                        <label for="ci" class="block text-gray-700 text-sm font-bold mb-2">CI:</label>
                        <input type="number" name="ci" class="form-input rounded-md shadow-sm w-full" value="{{ $empleado->ci }}">
                    </div>
                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre Completo:</label>
                        <input type="text" name="nombre" class="form-input rounded-md shadow-sm w-full" value="{{ $empleado->nombre }}">
                    </div>
                    <div class="mb-4">
                        <label for="direccion" class="block text-gray-700 text-sm font-bold mb-2">Dirección:</label>
                        <input type="text" name="direccion" class="form-input rounded-md shadow-sm w-full" value="{{ $empleado->direccion }}">
                    </div>
                    <div class="mb-4">
                        <label for="telefono" class="block text-gray-700 text-sm font-bold mb-2">Teléfono:</label>
                        <input type="number" name="telefono" class="form-input rounded-md shadow-sm w-full" value="{{ $empleado->telefono }}">
                    </div>
                    <div class="mb-4">
                        <label for="sexo" class="block text-gray-700 text-sm font-bold mb-2">Sexo:</label>
                        <select name="sexo" class="form-select rounded-md shadow-sm w-full">
                            <option value="M" {{ $empleado->sexo === 'M' ? 'selected' : '' }}>Masculino</option>
                            <option value="F" {{ $empleado->sexo === 'F' ? 'selected' : '' }}>Femenino</option>
                        </select>
                    </div>

                    <a href="{{ route('empleado.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Regresar</a>
                    <button type="submit" class="btn btn-success"> Guardar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
