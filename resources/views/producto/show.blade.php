<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">Producto:</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Contenedor Flexbox -->
                <div style="display: flex; justify-content: space-between;">
                    <!-- Columna de detalles -->
                    <div>
                        <h3 style="color: black; font-size: 1.5em;">Nombre: {{ $producto->nombre }}</h3>
                        {{-- <h3 style="color: black; font-size: 1.5em;">Precio: {{ $producto->precioventa }}</h3> --}}
                        <h3 style="color: black; font-size: 1.5em;">Stock: {{ $producto->stock }}</h3>
                        <h3 style="color: black; font-size: 1.5em;">Descripción: {{ $producto->descripcion }}</h3>
                        <div class="mt-4">
                            <span class="text-2xl font-semibold">${{ $producto->precioventa }}</span>
                            <form action="{{ route('carrito.agregarProducto') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $producto->id }}">
                                @role('cliente') <label for="cantidad">Cantidad:</label>
                                <input type="number" name="cantidad" value="1" min="1">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Agregar</button>@endrole
                            </form>
                        </div>
                    </div>

                    <div>
                        <h3 class="py-2 px-4 text-gray-700">
                            <center>
                                <img style="height: 300px; width: 500px;" src="{{ asset($producto->imagen_url) }}" alt="">
                            </center>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex">
                <h3 class="mb-5 inline"><b>Productos relacionados</b></h3>
            </div>
            <div class="productos-relacionados" style="display: flex; overflow-x: auto;">
                @foreach ($productosRelacionados as $productoRelacionado)
                    <div class="producto" style="flex: 0 0 auto; width: 200px; margin-right: 16px;">
                        <img src="{{ asset($productoRelacionado->imagen_url) }}" alt="{{ $productoRelacionado->nombre }}" style="width: 100%; height: auto;">
                        <h3>{{ $productoRelacionado->nombre }}</h3>
                        <p>Precio: ${{ $productoRelacionado->precioventa }}</p>
                        <a href="{{ route('producto.show', ['producto' => $productoRelacionado->id]) }}"class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-2 rounded">Mostrar</a>
                    
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>