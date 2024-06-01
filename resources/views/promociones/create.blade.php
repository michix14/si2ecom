<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Promoción') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('promociones.store') }}" method="POST">
                    @csrf

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
                        <p id="precio_original" class="text-gray-800"></p>
                    </div>

                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre Promocion:</label>
                        <input type="text" name="nombre" class="form-input rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="precio_descuento" class="block text-gray-700 text-sm font-bold mb-2">Precio Descuento:</label>
                        <input type="number" name="precio_descuento" id="precio_descuento" class="form-input rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label for="fecha_inicio" class="block text-gray-700 text-sm font-bold mb-2">Fecha Inicio:</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-input rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="fecha_fin" class="block text-gray-700 text-sm font-bold mb-2">Fecha Fin:</label>
                        <input type="date" name="fecha_fin" id="fecha_fin" class="form-input rounded-md shadow-sm" required>
                    </div>


                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Crear Promoción
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
