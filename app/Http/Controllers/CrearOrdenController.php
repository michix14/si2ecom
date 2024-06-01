<?php

namespace App\Http\Controllers;

use App\Models\carritoventa;


use Illuminate\Http\Request;

class CrearOrdenController extends Controller
{
    public $tipo_envio = 1;
    
    public $contacto, $telefono, $departamento, $ciudad, $direccion, $referencia;

    public function __invoke()
    {
        $carrito = carritoventa::where('cliente_id', auth()->user()->cliente->id)->first();
        return view('crear-orden', compact('carrito'));
    }
}
