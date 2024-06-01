<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('empleado.index',['empleados'=>empleado::all()] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleado.create',['empleados'=>Empleado::all()] );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Insertamos
        $validated = $request->validate([
            'ci'=>'required|unique:empleados|max:10',
            'nombre'=>'required|max:255',
            'direccion'=>'required|nullable',
            'telefono'=>'required',
            'sexo'=>'required',
        ]);
        
        empleado::create($validated);


        $empleado=new empleado();
        $empleado->ci=$request->input('ci');
        $empleado->nombre=$request->input('nombre');
        $empleado->direccion=$request->input('direccion');
        $empleado->telefono=$request->input('telefono');
        $empleado->sexo=$request->input('sexo');
        $empleado->save();
        activity()->useLog('empleado')->log('creado')->subject($empleado);

        return view("empleado.message",['msg'=>"Guardado con Exito"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(empleado $empleado)
    {
         return view('empleado.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(empleado $empleado)
    {
    return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, empleado $empleado)
        {
            $request->validate([
                'ci' => 'required|max:10|unique:empleados,ci,' . $empleado->id,
                'nombre' => 'required|max:255',
                'direccion' => 'required|nullable',
                'telefono' => 'required',
                'sexo' => 'required',
            ]);
        
            $empleado->ci = $request->input('ci');
            $empleado->nombre = $request->input('nombre');
            $empleado->direccion = $request->input('direccion');
            $empleado->telefono = $request->input('telefono');
            $empleado->sexo = $request->input('sexo');
            activity()->useLog('empleado')->log('modificado')->subject($empleado);
            $empleado->save();
        
            return view("empleado.message", ['msg' => "Registro actualizado con éxito"]);
        }
        

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(empleado $id)
    {
        empleado::destroy($id);
    }

    
}
