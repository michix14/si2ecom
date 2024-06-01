<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">Datos:</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('cliente.update', $cliente) }}" method="POST">
                    @method("PUT")
                    @csrf
                    <div class="flex w-full" style="gap: 3rem;">
                        <div class="mb-4 w-96 mr-5" style="width: 24rem;">
                            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Descripcion:</label>
                            <input type="text" name="nombre" class="form-input rounded-md shadow-sm w-full" value="{{ $cliente->nombre }}">
                        </div>
                        <div class="mb-4 w-96 mr-5" style="width: 24rem;">
                            <label for="ci" class="block text-gray-700 text-sm font-bold mb-2">CI:</label>
                            <input type="number" name="ci" class="form-input rounded-md shadow-sm w-full" value="{{ $cliente->ci }}">
                        </div>
                    </div>

                    <div class="flex w-full" style="gap: 3rem;">
                        <div class="mb-4 w-96 mr-5" style="width: 24rem;">
                            <label for="direccion" class="block text-gray-700 text-sm font-bold mb-2">Descripcion:</label>
                            <input type="text" name="direccion" class="form-input rounded-md shadow-sm w-full" value="{{ $cliente->direccion }}">
                        </div>
    
                        <div class="mb-4 w-96 mr-5" style="width: 24rem;">
                            <label for="telefono" class="block text-gray-700 text-sm font-bold mb-2">Telefono:</label>
                            <input type="number" name="telefono" class="form-input rounded-md shadow-sm w-full" value="{{ $cliente->telefono }}">
                        </div>
                    </div>

                    <div class="flex w-full" style="gap: 3rem;">
                        <div class="mb-4">
                            <label for="sexo" class="block text-gray-700 text-sm font-bold mb-2">Sexo:</label>
                            <select name="sexo" class="form-select rounded-md shadow-sm w-full" value="{{ $cliente->sexo }}">
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                    </div>
                    

                    <input type="hidden" id="latitud" name="latitud" value="{{ $cliente->latitud }}">
                    <input type="hidden" id="longitud" name="longitud" value="{{ $cliente->longitud }}">
                    
                    <div id="map" style="height: 400px; width: 60%;"></div>

                    <a href="{{ route('shop') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Regresar</a>
                    <button type="submit" class="btn btn-success"> Guardar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Código JavaScript para el mapa -->
    <script>
        var latitud = {{ $cliente->latitud ?? 'null' }};
        var longitud = {{ $cliente->longitud ?? 'null' }};
        // Si la latitud y la longitud son null, establece sus valores en tus coordenadas predeterminadas
        if (latitud === null && longitud === null) {
            latitud = -17.783227231051523;
            longitud = -63.18223914392476;
        }

        var map = L.map('map').setView([latitud, longitud], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        var marker = L.marker([latitud, longitud]).addTo(map);

        map.on('click', function(e) {
            marker.setLatLng(e.latlng);

            document.getElementById('latitud').value = e.latlng.lat;
            document.getElementById('longitud').value = e.latlng.lng;
        });

    </script>
</x-app-layout>