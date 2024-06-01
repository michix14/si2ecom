<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">Agregar Producto</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('producto.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                        <input type="text" name="nombre" class="form-input rounded-md shadow-sm w-full" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="stock" class="block text-gray-700 text-sm font-bold mb-2">Stock:</label>
                        <input type="number" name="stock" step="any" value="0.00" class="form-input rounded-md shadow-sm w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">Descripcion:</label>
                        <input type="text" name="descripcion" class="form-input rounded-md shadow-sm w-full">
                    </div>
                    <div class="mb-4">
                        <label for="precioventa" class="block text-gray-700 text-sm font-bold mb-2">Precio Venta:</label>
                        <input type="number" name="precioventa" step="any" value="0.00" class="form-input rounded-md shadow-sm w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="marca" class="block text-gray-700 text-sm font-bold mb-2">Marcas:</label>
                        <select name="id_marca" class="form-input rounded-md shadow-sm w-full" required>
                            <option value="">Seleccione una marca</option>
                            @foreach($marcas as $marca)
                                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="categoria" class="block text-gray-700 text-sm font-bold mb-2">Categoría:</label>
                        <select name="id_categoria" class="form-input rounded-md shadow-sm w-full" required>
                            <option value="">Seleccione una categoría</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="imagen_url" class="block text-gray-700 text-sm font-bold mb-2">Insertar Imagen:</label>
                        <input type="file" name="imagen_url" step="any" value="0.00" class="form-input rounded-md shadow-sm w-full" required>
                    </div>
                    
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

