<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Promoción') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('promociones.update', $promocion->id) }}" method="POST">
                    @csrf
                    @method('PUT') {{-- Agrega esta línea para indicar que es una solicitud PUT para la actualización --}}

                    <div class="mb-4">
                        <label for="id_producto" class="block text-gray-700 text-sm font-bold mb-2">Producto:</label>
                        <select name="id_producto" id="id_producto" class="form-select block rounded-md shadow-sm" onchange="actualizarPrecioOriginal()">
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->id }}" data-precio="{{ $producto->precioventa }}">{{ $producto->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="precio_original" class="block text-gray-700 text-sm font-bold mb-2"></label>
                        <p id="precio_original" class="text-gray-800">{{ $promocion->producto->precioventa }}</p>
                    </div>

                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre Promocion:</label>
                        <input type="text" name="nombre" class="form-input rounded-md shadow-sm" value="{{ $promocion->nombre }}"required>
                    </div>

                    <div class="mb-4">
                        <label for="precio_descuento" class="block text-gray-700 text-sm font-bold mb-2">Precio Descuento:</label>
                        <input type="number" name="precio_descuento" id="precio_descuento" class="form-input rounded-md shadow-sm" value="{{ $promocion->precio_descuento }}">
                    </div>

                    <div class="mb-4">
                        <label for="fecha_inicio" class="block text-gray-700 text-sm font-bold mb-2">Fecha Inicio:</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-input rounded-md shadow-sm" value="{{ $promocion->fecha_inicio }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="fecha_fin" class="block text-gray-700 text-sm font-bold mb-2">Fecha Fin:</label>
                        <input type="date" name="fecha_fin" id="fecha_fin" class="form-input rounded-md shadow-sm" value="{{ $promocion->fecha_fin }}" required>
                    </div>

                    <!-- Agregar más campos según tus necesidades -->

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Actualizar Promoción
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function actualizarPrecioOriginal() {
            var select = document.getElementById("id_producto");
            var precioOriginalElement = document.getElementById("precio_original");
            var precioOriginal = select.options[select.selectedIndex].getAttribute("data-precio");
            precioOriginalElement.innerHTML = "Precio Original: " + precioOriginal;
        }
    </script>
</x-app-layout>

