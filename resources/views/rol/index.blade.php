<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('roles.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Crear</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left py-2 px-4 text-gray-700 sm:w-20">ID</th>
                            <th class="text-left py-2 px-4 text-gray-700">NOMBRE</th>
                            <th class="text-left py-2 px-4 text-gray-700">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @php
                        $roles = $roles->sortBy('id');
                        @endphp

                        @foreach ($roles as $role)
                        <tr>
                            <td class="py-2 px-4 text-gray-700 sm:w-20">{{ $role->id }}</td>
                            <td class="py-2 px-4 text-gray-700">{{ $role->name }}</td>
                            <td class="py-2 px-4 text-gray-700 flex items-center space-x-2">
                                <a href="{{ route('roles.edit', $role) }}" class="btn-edit bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>
                                <form action="{{ route('roles.destroy', $role) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Está seguro de que desea eliminar este rol?');">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn-delete bg-red-500 hover:bg-red-700 text-white font-semibold py-1 px-2 rounded">
                                        <svg class="h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </form>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
