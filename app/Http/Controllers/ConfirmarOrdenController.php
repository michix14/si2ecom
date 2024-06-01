<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\carritoventa;
use App\Models\cliente;
use App\Models\detalle_carritoventa;
use App\Models\notaventa;
use App\Models\producto;
use App\Models\detalleventa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConfirmarOrdenController extends Controller
{
    //
    public function __invoke()
    {

        // Obtener el ID del cliente a partir del usuario autenticado
        $usuario_id = Auth::user()->id;

        // Buscar el carrito asociado al cliente
        $cliente = cliente::where('user_id', $usuario_id)->first();
        $clienteId = $cliente->id;

        // Buscar el carrito asociado al cliente
        $carrito = carritoventa::where('cliente_id', $clienteId)->first();
        $carrito_id = $carrito->id;

        // Obtener datos del carrito
        $productosCarrito = detalle_carritoventa::where('carrito_id', $carrito_id)->get();

        // Crear la nota de venta
        $notaVenta = notaventa::create([
            'cliente_id' => $clienteId,
            'total' => $carrito->total,
        ]);

        // Iterar sobre los productos del carrito y crear detalles de la venta
        foreach ($productosCarrito as $productoCarrito) {
            detalleventa::create([
                'venta_id' => $notaVenta->id,
                'producto_id' => $productoCarrito->producto_id,
                'cantidad' => $productoCarrito->cantidad,
                'precio' => $productoCarrito->precio * $productoCarrito->cantidad,
            ]);

            // Actualizar el stock del producto
            $producto = producto::find($productoCarrito->producto_id);
            $producto->stock -= $productoCarrito->cantidad;
            $producto->save();
        }

        // Eliminar todos los productos del carrito
        detalle_carritoventa::where('carrito_id', $carrito_id)->delete();

        // Actualizar el total del carrito
        $carrito->total = 0;
        $carrito->save();

        // Retornar una respuesta exitosa o redirigir a una página de confirmación
        return view('confirmar-orden');
    }
}
