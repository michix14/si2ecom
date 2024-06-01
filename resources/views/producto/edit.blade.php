<<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">Editar Producto</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('producto.update', $producto) }}" method="POST" enctype="multipart/form-data">
                    @method("PUT")
                    @csrf
                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                        <input type="text" name="nombre" class="form-input rounded-md shadow-sm w-full" value="{{ $producto->nombre }}">
                    </div>
                    <div class="mb-4">
                        <label for="stock" class="block text-gray-700 text-sm font-bold mb-2">Stock:</label>
                        <input type="number" name="stock" step="0.01" min="0" class="form-input rounded-md shadow-sm w-full" value="{{ $producto->stock }}">
                    </div>
                    <div class="mb-4">
                        <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">Descripcion:</label>
                        <input type="text" name="descripcion" class="form-input rounded-md shadow-sm w-full" value="{{ $producto->descripcion }}">
                    </div>
                    <div class="mb-4">
                        <label for="precioventa" class="block text-gray-700 text-sm font-bold mb-2">Precio Venta:</label>
                        <input type="number" name="precioventa" step="0.01" min="0" class="form-input rounded-md shadow-sm w-full" value="{{ $producto->precioventa }}">
                    </div>

                    <div class="mb-4">
                        <label for="id_marca" class="block text-gray-700 text-sm font-bold mb-2">Marca:</label>
                        <select name="id_marca" id="id_marca" class="form-select rounded-md shadow-sm w-full">
                            @foreach ($marcas as $id => $nombre)
                                <option value="{{ $id }}" {{ $producto->id_marca == $id ? 'selected' : '' }}>{{ $nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="id_categoria" class="block text-gray-700 text-sm font-bold mb-2">Categoria:</label>
                        <select name="id_categoria" id="id_categoria" class="form-select rounded-md shadow-sm w-full">
                            @foreach ($categorias as $id => $nombre)
                                <option value="{{ $id }}" {{ $producto->id_categoria == $id ? 'selected' : '' }}>{{ $nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="imagen_url" class="block text-gray-700 text-sm font-bold mb-2">Imagen:</label>
                        <input type="file" name="imagen_url" class="form-input rounded-md shadow-sm w-full">
                        <img src="{{ asset($producto->imagen_url) }}" alt="" class="imagen-producto">
                    </div>

                    <a href="{{ route('producto.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Regresar</a>
                    <button type="submit" class="btn btn-success"> Guardar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
