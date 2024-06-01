<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
    protected $fillable = [
        'id',
        'ci', 
        'nombre', 
        'direccion', 
        'telefono', 
        'sexo',
        'correo de contacto'];

    use HasFactory;
    public $timestamps = false;
}
