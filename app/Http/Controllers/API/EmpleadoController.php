<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\empleado;
//use App\Http\Requests\Product\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpleadoController extends Controller
{
    public function index()
    {
        $statusCode = 200;
        $empleado = empleado::paginate(10);
        return response()->json($empleado, $statusCode);
    }

    public function store(Request $request)
    {
        $statusCode = 201;
        $data = array('message' => 'Empleado creado con éxito');        
        $validator = Validator::make($request->all(), [
            'ci'=>'required|unique:empleados|max:10',
            'nombre'=>'required|max:255',
            'direccion'=>'required|nullable',
            'telefono'=>'required',
            'sexo'=>'required',
        ]);
        if ($validator->fails()) {
            $data['message'] = 'Error al crear el empleado';
            $statusCode = 400;
            $data['errors'] = $validator->messages();
        } else {
            $empleado = empleado::create($validator->validated());
            $data['empleado'] = $empleado;
        }
        return response()->json($data, $statusCode);
    }

    public function show(empleado $empleado)
    {
        $data = array('message' => 'Empleado encontrado con éxito');
        $data['empleado'] = $empleado;
        return response()->json($data, 200);
    }

    public function update(Request $request, empleado $empleado){
        $statusCode = 200;
        $data = array('message' => 'Empleado actualizado con éxito');
        $validator = Validator::make($request->all(), [
            'ci'=>'required|max:10|unique:empleados,ci,'.$empleado->id.',id',
            'nombre'=>'required|max:255',
            'direccion'=>'required|nullable',
            'telefono'=>'required',
            'sexo'=>'required',
        ]);
        if ($validator->fails()) {
            $data['message'] = 'Error al actualizar el empleado';
            $statusCode = 400;
            $data['errors'] = $validator->messages();
        } else {
            $empleado->update($validator->validated());
            $data['empleado'] = $empleado;
        }
        return response()->json($data, $statusCode);
    }

    public function destroy(empleado $empleado) {
        $data = array('message' => 'Empleado eliminado con éxito');
        $data['empleado'] = $empleado;
        $empleado->delete();
        return response()->json($data, 200);
    }

    public static function missing(Request $request) {
        $data = array('error' => "El empleado con id = {$request->route('empleado')} no existe.");
        return response()->json($data, 404);
    }
}