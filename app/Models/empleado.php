<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    protected $fillable = [
//        'id',
        'ci', 
        'nombre', 
        'direccion', 
        'telefono', 
        'sexo'
    ];

    use HasFactory;
    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id_emp');
    }
    public $timestamps = false;
}
