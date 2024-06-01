<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Carrito de Compras
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        @if ($carrito->detalle_carritoventa->isEmpty())
                            <p class="text-center">Tu carrito está vacío.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" style="table-layout: fixed; word-wrap: break-word;">
                                    <thead>
                                        <tr>
                                            <th style="width: 20%;">Producto</th>
                                            <th style="width: 15%;">Cantidad</th>
                                            <th style="width: 15%;">Precio Unitario</th>
                                            <th style="width: 15%;">Total</th>
                                            <th style="width: 20%;">Imagen</th>
                                            <th style="width: 15%;">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carrito->detalle_carritoventa as $detalle)
                                            <tr>
                                                <td>{{ $detalle->producto->nombre }}</td>
                                                <td>{{ $detalle->cantidad }}</td>
                                                <td>${{ $detalle->precio }}</td>
                                                <td>${{ $detalle->cantidad * $detalle->precio }}</td>
                                                <td>
                                                    <img src="{{ asset($detalle->producto->imagen_url) }}"
                                                        alt="{{ $detalle->producto->nombre }}" class="img-thumbnail"
                                                        style="max-width: 100px; max-height: 100px;">
                                                </td>
                                                <td>
                                                    <!-- Botones con estilo -->
                                                    <a href="{{ route('carrito.quitar', $detalle->id) }}"
                                                        class="btn btn-danger btn-sm mb-2" style="width: 100%;">Quitar</a><br/>
                                                        <form action="{{ route('carrito.update', $detalle->id) }}" method="POST" class="mt-2">
                                                            @csrf
                                                            @method('PATCH')
                                                            <!-- Input con estilo -->
                                                            <input type="number" name="cantidad" value="{{ $detalle->cantidad }}" min="1" class="form-control mb-2" style="width: 100%;">
                                                            <!-- Botón con estilo -->
                                                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Guardar cambios</button>
                                                       </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Botón de confirmación -->
                            <div class="text-right mt-3">
                                <!-- Total con estilo -->
                                <p><strong>Total: ${{ $carrito->total }}</strong></p> 
                                <!-- Botón con estilo -->
                                <a href="{{ route('ordenes.crear') }}">
                                    <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded" style="width: 100%;">Confirmar compra</button>
                                </a>                                   
                            </div> 
                        @endif
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</x-app-layout> 