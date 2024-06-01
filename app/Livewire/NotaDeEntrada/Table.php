<?php

namespace App\Livewire\NotaDeEntrada;

use App\Models\DetalleEntrada;
use App\Models\NotaDeEntrada;
use App\Models\producto;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\On; 

class Table extends Component
{
    public $filas = [];
    public $registros = [];

    public $total = 0;

    protected $listeners = ['agregar','store'];

    #[On('agregar-fila')]
    public function agregar($fila) {
        array_push( $this->registros, $fila );

        $categoria = DB::table('categorias')->where('id', $fila['id_categoria'])->value('nombre');
        $marca = DB::table('marcas')->where('id', $fila['id_marca'])->value('nombre');

        $fila['id_categoria'] = $categoria;
        $fila['id_marca'] = $marca;

        $fila['subtotal'] = (double) ($fila['precioventa']) * (double) ($fila['stock']);
        $this->total += (double) $fila['subtotal'];

        array_push( $this->filas, $fila );
    }

    #[On('store-registry')]
    public function store($numero, $proveedor) {
        if (count($this->registros) > 0){
            $notaDeEntrada = NotaDeEntrada::create([
                'numero' => $numero,
                'fecha' => Carbon::now()->toDateString(),
                'proveedor' => $proveedor,
                'total' => $this->total,
            ]);

            foreach ($this->registros as $registro) {
                
                $producto = producto::create([
                    'nombre' => $registro['nombre'],
                    'stock' => $registro['stock'],
                    'descripcion' => $registro['descripcion'],
                    'precioventa' => $registro['precioventa'],
                    'id_marca' => $registro['id_marca'],
                    'id_categoria' => $registro['id_categoria'],
                    //'imagen_url' => $registro['imagen_url'],
                ]);

                DetalleEntrada::create([
                    'nota_de_entrada' => $notaDeEntrada->id,
                    'producto' => $producto->id,
                    'cantidad' => $registro['stock'],
                    'precio' => $registro['precioventa'],
                    'total' => (double) ($registro['stock']) * (double)($registro['precioventa']),
                ]);
            }
        }
        activity()->useLog('Nota de entrada')->log('creado')->subject($notaDeEntrada);
        return redirect()->route('nota-de-entrada.index');
    }

    public function editar($index) {
        $fila = $this->registros[$index];
        $this->dispatch('editar', fila: $fila);
        $this->eliminar($index);
    }

    public function eliminar($index) {
        $this->total -= (double) $this->filas[$index]['subtotal'];

        unset($this->filas[$index]);
        $this->filas = array_values($this->filas);
        unset($this->registros[$index]);
        $this->registros = array_values($this->registros);
    }

    public function render()
    {
        return view('livewire.nota-de-entrada.table');
    }
}
