<?php

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\carritoventa;
use App\Models\detalle_carritoventa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetalleCarritoVentaController extends Controller
{
    public function agregarProducto(Request $request)
    {
        $producto = producto::find($request->input('producto_id'));
        $carrito = carritoventa::find($request->input('carrito_id'));

        if (!$producto || !$carrito) {
            return redirect()->route('productos.index')->with('error', 'No se pudo agregar el producto al carrito.');
        }

        $cantidad = $request->input('cantidad');
        $subtotal = $producto->precioventa * $cantidad;

        // Verifica si el producto ya está en el carrito
        $detalle = detalle_carritoventa::where('carrito_id', $carrito->id) ->where('producto_id', $producto->id)->first();
        if ($detalle) {
            // El producto ya está en el carrito, actualiza la cantidad y el subtotal
            $detalle->cantidad += $cantidad;
            $detalle->subtotal += $subtotal;
            $detalle->save();
        } else {
            // El producto no está en el carrito, crea un nuevo detalle
            $detalle = new detalle_carritoventa([
                'carrito_id' => $carrito->id,
                'producto_id' => $producto->id,
                'cantidad' => $cantidad,
                'subtotal' => $subtotal,
            ]);
            $detalle->save();
        }
        // Actualiza el total del carrito
        $this->actualizarTotalCarrito($carrito);
        activity()->useLog('carrito')->log('creado')->subject($carrito);
        return redirect()->route('carrito.index')->with('success', 'Producto agregado al carrito.');
    }


    public function eliminarProducto($detalleId)
    {
        $detalle = detalle_carritoventa::findOrFail($detalleId);
        $carrito = carritoventa::find($detalle->carrito_id);

        if (!$carrito) {
            return redirect()->route('carrito.index')->with('error', 'No se pudo eliminar el producto del carrito.');
        }

        $detalle->delete();

        // Actualiza el total del carrito
        $this->actualizarTotalCarrito($carrito);
        activity()->useLog('carrito')->log('producto eliminado')->subject($carrito);
        return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito.');
    }

    public function vaciarCarrito($carritoId)
    {
        detalle_carritoventa::where('carrito_id', $carritoId)->delete();
        $carrito = carritoventa::find($carritoId);

        if ($carrito) {
            $carrito->total = 0;
            $carrito->save();
        }
        activity()->useLog('carrito')->log('vaciado')->subject($carrito);
        return redirect()->route('carrito.index')->with('success', 'Carrito vaciado.');
    }

    // Agrega otros métodos que puedas necesitar

    private function actualizarTotalCarrito(carritoVenta $carrito)
    {
        $total = detalle_carritoventa::where('carrito_id', $carrito->id)->sum('subtotal');
        $carrito->total = $total;
        $carrito->save();
    }

}
