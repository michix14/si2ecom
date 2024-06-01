<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h1>Bitacora de Actividades</h1>
            <div class="flex items-center">
                <form action="{{ route('bitacora.index') }}" method="GET" class="mr-4">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Buscar actividad...">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <button onclick="window.print()" class="btn btn-primary"><i class="fas fa-print"></i> Imprimir</button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left py-2 px-4 text-gray-700 sm:w-20">ID</th>
                            <th class="text-left py-2 px-4 text-gray-700">Usuario</th>
                            <th class="text-left py-2 px-4 text-gray-700">ID Usuario</th>
                            <th class="text-left py-2 px-4 text-gray-700">CRUD</th>
                            <th class="text-left py-2 px-4 text-gray-700">Fecha</th>
                            <th class="text-left py-2 px-4 text-gray-700">Acciones</th>
                            <th class="text-left py-2 px-4 text-gray-700">Imprimir</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @php
                            $actividades = $actividades->sortBy('id');
                        @endphp

                        @foreach ($actividades as $actividad)
                            <tr>
                                <td class="py-2 px-4 text-gray-700 sm:w-20">{{ $actividad->id }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $actividad->name }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $actividad->causer_id }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $actividad->log_name }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $actividad->created_at }}</td>
                                <td class="py-2 px-4 text-gray-700">{{ $actividad->description}}</td>
                                <td class="py-2 px-4 text-gray-700 flex justify-center">
                                    <button onclick="window.print()" class="btn btn-primary"><i class="fas fa-print"></i> Imprimir</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
