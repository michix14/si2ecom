<div class="flex justify-center gap-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 ">
        <h3 class="mb-5"><b>Nota de Entrada</b></h3>
        <div class="mb-4">
            <label for="numero" class="block text-gray-700 text-sm font-bold mb-2">Numero:</label>
            <input wire:model="numero" type="text" name="numero" class="form-input rounded-md shadow-sm w-96" required>
        </div>
        <div class="mb-4">
            <label for="proveedor" class="block text-gray-700 text-sm font-bold mb-2">Proveedor:</label>
            <input wire:model="proveedor" type="text" name="proveedor" class="form-input rounded-md shadow-sm w-96" required>
        </div>
        
        <button wire:click="traspaso" id="btn-form" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
            Guardar Nota de Entrada
        </button>
    </div>
        
    <div class="shadow-xl bg-white p-6 sm:rounded-lg">
        <h3 class="mb-5"><b>Producto</b></h3>
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
            <input wire:model="nombre" type="text" name="nombre" class="form-input rounded-md shadow-sm w-96" value="{{ old('nombre',$nombre) }}"  required>
        </div>
        {{-- <div class="mb-4">
            <label for="imagen_url" class="block text-gray-700 text-sm font-bold mb-2">Insertar Imagen:</label>
            <input type="file" wire:model="imagen_url" name="imagen_url" step="any" value="0.00" class="form-input rounded-md shadow-sm w-full" required>
        </div> --}}
        <div class="mb-4">
            <label for="stock" class="block text-gray-700 text-sm font-bold mb-2">Cantidad:</label>
            <input wire:model="stock" type="number" name="stock" class="form-input rounded-md shadow-sm w-96" value="{{ old('stock',$stock) }}"  required>
        </div>
        <div class="mb-4">
            <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
            <textarea wire:model="descripcion" name="descripcion" id="descripcion" cols="40" rows="5" class="rounded-md shadow-sm w-96 resize-none">{{ old('descripcion',$descripcion) }}</textarea>
            {{-- <input type="number" name="descripcion" class="form-input rounded-md shadow-sm w-96" required> --}}
        </div>
        <div class="mb-4">
            <label for="precioventa" class="block text-gray-700 text-sm font-bold mb-2">Precio:</label>
            <input wire:model="precioventa" type="number" step="0.01" min="0" value="0.00" name="precioventa" class="form-input rounded-md shadow-sm w-96" value="{{ old('precioventa',$precioventa) }}"  required>
        </div>
        <div class="mb-4">
            <label for="id_marca" class="block text-gray-700 text-sm font-bold mb-2">Marca:</label>
            <select wire:model="id_marca" name="id_marca" id="id_marca" class="form-input rounded-md shadow-sm w-96">
                <option value="0">Sin Marca</option>
                @foreach ($marcas as $marca)
                    <option value="{{ $marca->id }}" @if ($marca->id == old('id_marca', $id_marca)) selected @endif > {{ $marca->nombre }} </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="id_categoria" class="block text-gray-700 text-sm font-bold mb-2">Categoría:</label>
            <select wire:model="id_categoria" name="id_categoria" id="id_categoria" class="form-input rounded-md shadow-sm w-96">
                <option value="0">Sin Categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @if ($categoria->id == old('id_categoria', $id_categoria)) selected @endif>{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button wire:click="enlistar"  class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Agregar Detalle</button>
    </div>
</div>

