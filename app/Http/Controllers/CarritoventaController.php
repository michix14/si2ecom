<?php

namespace App\Http\Controllers;
use App\Models\carritoventa;
use App\Models\producto;
use Illuminate\Http\Request;
use App\Models\detalle_carritoventa;
use App\Models\cliente;

class CarritoventaController extends Controller
{
    
    public function shop()
    {
        $productos = Producto::with('promotions')->get();
        return view('shop')->with(['productos' => $productos]);
    }

    public function agregarProducto(Request $request)
    {
        $carrito = carritoventa::where('cliente_id', auth()->user()->cliente->id)->first();
        $producto = producto::find($request->id);
        //dd($carrito, $producto);
        // Comprobar si ya hay un detalle del producto en el carrito, si existe, actualiza la cantidad.
        $detalleExistente = detalle_carritoventa::where('carrito_id', $carrito->id)
            ->where('producto_id', $producto->id)
            ->first();

        if ($detalleExistente) {
            $detalleExistente->update([
                'cantidad' => $detalleExistente->cantidad + $request->cantidad,
            ]);
        } else {
            detalle_carritoventa::create([
                'carrito_id' => $carrito->id,
                'producto_id' => $producto->id,
                'cantidad' => $request->cantidad,
                'precio' => $producto->precioventa,
            ]);
        }

        $this->actualizarTotalCarrito($carrito);

        return redirect()->route('carrito.index')->with('success', 'Producto agregado al carrito');
    }

    public function index()
    {
        $carrito = carritoventa::where('cliente_id', auth()->user()->cliente->id)->first();
        return view('carrito.index', compact('carrito'));
    }


    public function store()
    {

    }

    public function show(carritoventa $carritoventa)
    {
    }

    public function edit(carritoventa $carritoventa)
    {
    }
    public function update(Request $request, $detalleId)
    {
    $detalle = detalle_carritoventa::findOrFail($detalleId);
    $request->validate([
        'cantidad' => 'required|integer|min:1',
    ]);
    $detalle->update([
        'cantidad' => $request->cantidad,
    ]);
    $this->actualizarTotalCarrito($detalle->carrito);
    return redirect()->route('carrito.index')->with('success', 'Cantidad actualizada.');    
    }

    public function eliminarProducto($detalleId)
    {
        $detalle = detalle_carritoventa::findOrFail($detalleId);
        $carrito = carritoventa::find($detalle->carrito_id);

        if (!$carrito) {
            return redirect()->route('carrito.index')->with('error', 'No se pudo eliminar el producto del carrito.');
        }

        $detalle->delete();
        $this->actualizarTotalCarrito($carrito);

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

        return redirect()->route('carrito.index')->with('success', 'Carrito vaciado.');
    }

    public function actualizarTotalCarrito($carrito)
    {
    $total = 0;
    foreach ($carrito->detalle_carritoventa as $detalle) {
        $total += $detalle->cantidad * $detalle->precio;
    }
        $carrito->update(['total' => $total]);
    }
}
