<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\producto;
use Illuminate\Http\Request;

class ProductoController extends Controller{

    public function index(Request $request){
        $search = $request->input('search');
        
        $productos = producto::
            select('productos.*', 'marcas.nombre as marca','categorias.nombre as categoria')
            ->join('marcas', 'marcas.id', '=', 'productos.id_marca')
            ->join('categorias', 'categorias.id', '=', 'productos.id_categoria')
            ->where('productos.nombre', 'ILIKE', '%'.$search.'%')
            ->orderBy('productos.id', 'desc')
            ->paginate(2);
        
        //$productos = producto::paginate(2);
        return $productos;
    }
}