<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @foreach ($productos->groupBy('id_categoria') as $id_categoria => $productosPorCategoria)
                    <h1 class="text-2xl font-semibold mb-4">{{ $productosPorCategoria->first()->categorias->nombre }}</h1>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($productosPorCategoria as $producto)
                            <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                                <img src="{{ asset($producto->imagen_url) }}" alt="{{ $producto->nombre }}"
                                    class="max-w-content h-32 object-contain max-w-content ">
                                <h2 class="text-xl font-semibold mt-2">{{ $producto->nombre }}</h2>
                                <p class="text-gray-600">{{ $producto->descripcion }}</p>
                                <p class="text-gray-600">Cantidad Disponible: {{ $producto->stock }}</p>
                                <a href="{{ route('producto.show', $producto) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-2 rounded">Mostrar</a>
                                <div class="mt-4">
                                    @if($producto->promotions->isNotEmpty() && $producto->promotions->first()->fecha_inicio <= now() && $producto->promotions->first()->fecha_fin >= now())
                                        <span class="text-2xl font-semibold precio-original">${{ $producto->precioventa }}</span>
                                        <span class="text-2xl font-semibold text-red-500">${{ $producto->promotions->first()->precio_descuento }}</span>
                                    @else
                                        <span class="text-2xl font-semibold">${{ $producto->precioventa }}</span>
                                    @endif
                                    <form action="{{ route('carrito.agregarProducto') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $producto->id }}">
                                        @role('cliente') <label for="cantidad">Cantidad:</label>
                                        <input type="number" name="cantidad" value="1" min="1">
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Agregar</button>@endrole
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('.precio-original').forEach((element) => {
                element.style.textDecoration = 'line-through';
            });
        });
    </script>
</x-app-layout>


