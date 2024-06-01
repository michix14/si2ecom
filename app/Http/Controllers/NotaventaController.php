<?php

namespace App\Http\Controllers;

use App\Models\notaventa;
use Illuminate\Http\Request;
use App\Models\cliente;
use App\Models\detalleventa;
use Illuminate\Support\Facades\Auth;
class NotaventaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $usuario_id = Auth::user()->id;

        // Buscar el carrito asociado al cliente
        $cliente = cliente::where('user_id', $usuario_id)->first();

        $notasDeVenta = notaventa::where('cliente_id', $cliente->id)->get();


        return view('miscompras')->with(['notasDeVenta' => $notasDeVenta]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(notaventa $notaventa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(notaventa $notaventa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, notaventa $notaventa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(notaventa $notaventa)
    {
        //
    }

    public function mostrarDetalles($id)
    {
        // Lógica para obtener los detalles de la compra con el ID proporcionado
        $detallesCompra = detalleventa::findOrFail($id);

        // Retornar la vista con los detalles de la compra
        return view('detalles_compra', ['detallesCompra' => $detallesCompra]);
    }

}
