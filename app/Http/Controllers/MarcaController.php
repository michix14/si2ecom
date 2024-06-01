<?php

namespace App\Http\Controllers;

use App\Models\marca;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('marca.index',['marcas'=>marca::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('marca.create');
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

        $marca=new marca();
        $marca->nombre=$request->input('nombre');
        $marca->descripcion=$request->input('descripcion');
        $marca->save();
        activity()->useLog('marca')->log('creada')->subject($marca);
        return view("marca.message",['msg'=>"Guardado con Exito"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(marca $marca)
    {
        return view('marca.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, marca $marca)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:255',
        ]);
    
        $marca->nombre = $request->input('nombre');
        $marca->descripcion = $request->input('descripcion');
        $marca->save();
        activity()->useLog('marca')->log('modificado')->subject($marca);
        return view("marca.message", ['msg' => "Registro actualizado con éxito"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $marca)
    {
        marca::destroy($marca);
        activity()->useLog('marca')->log('eliminada')->subject($marca);
        return redirect()->route('marca.index');
    }
}
