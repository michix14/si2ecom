<?php

namespace App\Livewire\NotaDeEntrada;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On; 

class Form extends Component
{
    use WithFileUploads;
    public $numero;
    public $proveedor;
    

    public $categorias;
    public $marcas;
    public $nombre;
    public $stock;
    public $descripcion;
    public $precioventa;
    public $id_marca;
    public $id_categoria;
    public $imagen_url;
    protected $rules = [
        'nombre' => 'required|max:50',
        //'imagen_url' => 'image',
        'stock' => 'required|numeric|min:0',
        'descripcion' => 'required|max:75',
        'precioventa' => 'required|numeric|min:0',
        'id_marca' => 'required|exists:marcas,id',
        'id_categoria' => 'required|numeric|exists:categorias,id',
    ];

    protected $listeners = ['editar'];

    public function enlistar() {
        $this->validate();
        // if ($this->imagen_url) {
        //     // Obtener el nombre de la imagen
        //     $nombreImagen = time() . '_' . $this->imagen_url->getClientOriginalName();

        //     // Almacenar la imagen y obtener la ruta
        //     $ruta = $this->imagen_url->storeAs('public/imagenes/vehiculos', $nombreImagen);

        //     // Obtener la URL de la imagen
        //     $url = Storage::url($ruta);
        // }
        $fila = array(
            'nombre' => $this->nombre,
            'stock' => $this->stock,
            'descripcion' => $this->descripcion,
            'precioventa' => $this->precioventa,
            'id_marca' => $this->id_marca,
            'id_categoria' => $this->id_categoria,
            //'imagen_url' => $url ?? null,
        );
        $this->reset(['nombre', 'stock','descripcion','precioventa','id_marca','id_categoria']);
        $this->dispatch('agregar', fila: $fila);        
    }

    public function traspaso(){
        $this->dispatch('store-registry', numero: $this->numero, proveedor: $this->proveedor); 
                
    }

    #[On('editar')]
    public function editar($fila) 
    {
        $this->nombre = $fila['nombre'];
        //$this->imagen_url = $fila['imagen_url'];
        $this->stock = $fila['stock'];
        $this->descripcion = $fila['descripcion'];
        $this->precioventa = $fila['precioventa'];
        $this->id_marca = $fila['id_marca'];
        $this->id_categoria = $fila['id_categoria'];
    }

    public function render()
    {
        return view('livewire.nota-de-entrada.form');
    }
}
