<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /* public function __construct()
     {
         $this->middleware('can:roles.index')->only('index');
         $this->middleware('can:roles.create')->only('create', 'store');
         $this->middleware('can:roles.edit')->only('edit', 'update');
         $this->middleware('can:roles.destroy')->only('destroy');
     }*/
    public function index()
    {
        return view('rol.index',['roles'=>Role::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions=Permission::all();
        return view('rol.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role=Role::create($request->all());
        $role->syncPermissions($request->permissions);
        activity()->useLog('Rol')->log('Nuevo')->subject($role);
        return view("rol.message",['msg'=>"Guardado con Exito"]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('rol.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('rol.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $role->update($request->all());
        $role->syncPermissions($request->permissions);
        $role->save();
        activity()->useLog('Rol')->log('modificado')->subject($role);
        return redirect()->route('roles.index')->with('info', 'El rol se actualizó con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        activity()->useLog('Rol')->log('eliminado')->subject($role);
        return redirect()->route('roles.index')->with('info', 'El rol se eliminó con exito');
    }
}
