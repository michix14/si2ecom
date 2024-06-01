<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }
    /**
     * Display the specified resource.
     */
    public function show(cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cliente $cliente)
    {
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cliente $cliente)
    {
        $request->validate([
            'ci'=>'required|max:255',
            'nombre'=>'required|max:255',
            'direccion'=>'required|max:255',
            'sexo'=>'required|max:255',
            'latitud'=>'required',
            'longitud'=>'required',
            'telefono'=>'required|max:255',
        ]);

        $cliente->ci = $request->input('ci');
        $cliente->nombre = $request->input('nombre');
        $cliente->direccion = $request->input('direccion');
        $cliente->telefono = $request->input('telefono');
        $cliente->sexo = $request->input('sexo');
        $cliente->latitud = $request->input('latitud');
        $cliente->longitud = $request->input('longitud');
        $cliente->save();

        return view("cliente.message", ['msg' => "Registro actualizado con éxito"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cliente $cliente)
    {
        //
    }
}
