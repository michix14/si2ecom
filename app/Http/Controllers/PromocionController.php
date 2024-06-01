<?php

namespace App\Http\Controllers;

use App\Models\promocion;
use App\Models\producto;
use Illuminate\Http\Request;

class PromocionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promociones = promocion::with('producto')->get();
        return view('promociones.index', compact('promociones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = producto::all();
        return view('promociones.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //// Validar la entrada del formulario
        $request->validate([
            'id_producto' => 'required|exists:productos,id',
            'nombre' => 'required|max:50',
            'precio_descuento' => 'required|numeric|min:0',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
        ]);

        // Crear la promoción
        Promocion::create($request->all());

        return redirect()->route('promociones.index')->with('success', 'Promoción creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(promocion $promocion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(promocion $promocion)
    {
        $productos = producto::all();
        return view('promociones.edit', compact('promocion', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, promocion $promocion)
    {
        // Validar la entrada del formulario
        $request->validate([
            'id_producto' => 'required|exists:productos,id',
            'nombre' => 'required|max:50',
            'precio_descuento' => 'required|numeric|min:0',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
        ]);

        // Actualizar la promoción
        $promocion->update($request->all());
        return redirect()->route('promociones.index')->with('success', 'Promoción actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(promocion $promocion)
    {
        // Eliminar la promoción
        $promocion->delete();
        return redirect()->route('promociones.index')->with('success', 'Promoción eliminada exitosamente.');
    }
}
