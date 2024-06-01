<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">Agregar Nota de Entrada</h1>
    </x-slot>

    <div class="py-12">
        @livewire('nota-de-entrada.form', ['categorias' => $categorias, 'marcas' => $marcas])
        
        @livewire('nota-de-entrada.table')
    </div>
</x-app-layout>