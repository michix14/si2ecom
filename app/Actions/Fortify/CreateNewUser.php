<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\cliente;
use App\Models\carritoventa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'ci' => ['required', 'string'], // Añade validación para otros campos del cliente
            'direccion' => ['required', 'string'],
            'telefono' => ['required', 'string'],
            'sexo' => ['required', 'string'],
        ])->validate();


        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $clienteRole = Role::where('name', 'cliente')->first();
        if ($clienteRole) {
        $user->assignRole($clienteRole);
         }

        $cliente = new cliente([
            'user_id' => $user->id,
            'ci' => $input['ci'],
            'nombre' => $input['name'],
            'direccion' => $input['direccion'],
            'telefono' => $input['telefono'],
            'sexo' => $input['sexo'],
        ]);
        $cliente->user()->associate($user); 
        $cliente->save();
        
        $carrito = new carritoventa([
            'cliente_id' => $cliente->id,
            'total' => 0, // Establece el total inicial como 0 o el valor que desees
            'estado' => 'activo', // Establece el estado inicial como "activo" u otro valor según tu lógica
        ]);
        $carrito->cliente()->associate($cliente);
        $carrito->save();
 
        activity()->useLog('cliente')->log('creado')->subject($cliente);
        activity()->useLog('user')->log('creado')->subject($user);
        return $user;
        
    }
}
