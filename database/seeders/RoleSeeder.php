<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'cliente']);
        $role2 = Role::create(['name' => 'admin']);
        //-----------------Mostrar Roles
        Permission::create([
            'name' => 'roles.index',
            'description' => 'Ver listado de roles'
        ])->syncRoles([$role2]);
        Permission::create([
            'name' => 'roles.create',
            'description' => 'Crear rol'
        ])->syncRoles([$role2]);
        Permission::create([
            'name' => 'roles.edit',
            'description' => 'Editar rol'
        ])->syncRoles([$role2]);
        Permission::create([
            'name' => 'roles.destroy',
            'description' => 'Eliminar rol'
        ])->syncRoles([$role2]);
        //----------------Mostrar Empleados
        Permission::create([
            'name' => 'Empleado.index',
            'description' => 'Ver listado de empleados'
        ])->syncRoles([$role2]);
        Permission::create([
            'name' => 'Empleado.create',
            'description' => 'Crear empleado'
        ])->syncRoles([$role2]);
        Permission::create([
            'name' => 'Empleado.edit',
            'description' => 'Editar empleados'
        ])->syncRoles([$role2]);
        Permission::create([
            'name' => 'Empleado.destroy',
            'description' => 'Eliminar empleados'
        ])->syncRoles([$role2]);
    }
}
