<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear nuevo rol') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf

                    <h1 class="text-2xl font-semibold mb-4">Crear nuevo rol</h1>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-600">Nombre</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" class="mt-1 p-2 border rounded-md w-full" required autofocus autocomplete="name">
                        @error('name')
                            <small class="text-red-600">* {{ $message }} </small>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="permissions" class="block text-sm font-medium text-gray-600">Lista de permisos</label>
                        @foreach ($permissions as $permission)
                            <div class="flex items-center">
                                <input class="mr-2" type="checkbox" value="{{ $permission->id }}" id="{{ $permission->id }}" name="permissions[]">
                                <label for="{{ $permission->id }}">{{ $permission->description }}</label>
                            </div>
                        @endforeach
                        @error('permissions')
                            <small class="text-red-600">* {{ $message }} </small>
                        @enderror
                    </div>

                    <div class="flex space-x-2">
                        <button type="submit" class="bg-green-500 text-white p-2 rounded">Guardar</button>
                        <a href="{{ route('roles.index') }}" class="bg-gray-300 text-gray-800 p-2 rounded">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
