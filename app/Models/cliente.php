<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
protected $fillable = [
    'id',
    'ci', 
    'nombre', 
    'direccion', 
    'telefono', 
    'latitud',
    'longitud',
    'sexo'];

use HasFactory;

public $timestamps = false;
public function user()
{
    return $this->belongsTo(User::class);
}

public function carritoventa()
{
    return $this->hasMany(carritoventa::class);
}

public function carritoVentaActivo()
{
// Asumiendo que hay una relación entre Cliente y CarritoVenta
return $this->carritoventa()->where('estado', 'activo')->first();
}

}