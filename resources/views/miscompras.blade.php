<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 grid grid-cols-5 gap-6">
            <div class="container">
        <h1>Mis Compras</h1>
        @if(count($notasDeVenta) > 0)
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
                padding: 12px;
            }
        
            th {
                background-color: #f2f2f2;
            }
        
            tr:hover {
                background-color: #f5f5f5;
            }
        
            .actions-column {
                display: flex;
                justify-content: space-around;
            }
        
            .actions-column a {
                text-decoration: none;
                color: #fff;
                padding: 8px 12px;
                border-radius: 4px;
            }
        
            .btn-primary {
                background-color: #007bff;
            }
        
            .btn-primary:hover {
                background-color: #0056b3;
            }
        </style>
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID de Compra</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notasDeVenta as $notaDeVenta)
                    <tr>
                        <td>{{ $notaDeVenta->id }}</td>
                        <td class="actions-column">
                            <a href="{{ route('detalles.compra', ['id' => $notaDeVenta->id]) }}" class="btn btn-primary">
                                Ver más
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        @else
            <p>No tienes compras realizadas.</p>
        @endif
    </div>
    </div>
</x-app-layout>