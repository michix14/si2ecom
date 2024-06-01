<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('categoria.index',['categorias'=>categoria::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|max:255',
            'descripcion'=>'required|max:255',
        ]);

        $marca=new categoria();
        $marca->nombre=$request->input('nombre');
        $marca->descripcion=$request->input('descripcion');
        $marca->save();
        activity()->useLog('categoria')->log('creado')->subject($marca);
        return view("categoria.message",['msg'=>"Guardado con Exito"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categoria $categoria)
    {
        return view('categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:255',
        ]);
    
        $categoria->nombre = $request->input('nombre');
        $categoria->descripcion = $request->input('descripcion');
        $categoria->save();
        activity()->useLog('categoria')->log('modificado')->subject($categoria);
        return view("categoria.message", ['msg' => "Registro actualizado con éxito"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $categoria)
    {
        categoria::destroy($categoria);
        activity()->useLog('categoria')->log('eliminado')->subject($categoria);
        return redirect()->route('categoria.index');
    }
}
