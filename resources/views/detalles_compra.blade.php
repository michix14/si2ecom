<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 grid grid-cols-5 gap-6">
        <div class="container">
            <h1>Detalles de la Compra</h1>

            <style>
                .table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                    font-size: 16px;
                }

                th, td {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                }

                th {
                    background-color: #f2f2f2;
                }

                tr:hover {
                    background-color: #f5f5f5;
                }
            </style>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID de Compra</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $detallesCompra->id }}</td>
                        <td>{{ $detallesCompra->producto->nombre }}</td>
                        <td>{{ $detallesCompra->cantidad }}</td>
                        <td>{{ $detallesCompra->precio }}</td>
                        <td>{{ $detallesCompra->precio * $detallesCompra->cantidad }}</td>
                    </tr>
                    <!-- Puedes agregar más filas si hay más productos en la compra -->
                </tbody>
            </table>

            <!-- Botón de impresión -->
            <button onclick="imprimir()">Imprimir</button>

            <script>
                function imprimir() {
                    window.print();
                }
            </script>
        </div>
    </div>
</x-app-layout>
