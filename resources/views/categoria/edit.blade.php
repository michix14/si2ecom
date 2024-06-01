<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">Editar Categoria</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('categoria.update', $categoria) }}" method="POST">
                    @method("PUT")
                    @csrf
                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre Completo:</label>
                        <input type="text" name="nombre" class="form-input rounded-md shadow-sm w-full" value="{{ $categoria->nombre }}">
                    </div>
                    <div class="mb-4">
                        <label for="direccion" class="block text-gray-700 text-sm font-bold mb-2">Descripcion:</label>
                        <input type="text" name="descripcion" class="form-input rounded-md shadow-sm w-full" value="{{ $categoria->descripcion }}">
                    </div>

                    <a href="{{ route('categoria.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Regresar</a>
                    <button type="submit" class="btn btn-success"> Guardar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
