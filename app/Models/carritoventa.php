<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carritoventa extends Model
{
    protected $table = 'carritoventas'; // Nombre de la tabla
    protected $fillable = ['cliente_id', 'total', 'estado']; // Campos que se pueden asignar

   
    public function cliente()
    {
        return $this->belongsTo(cliente::class, 'cliente_id');
    }

    public function detalle_carritoventa()
    {
        return $this->hasMany(detalle_carritoventa::class, 'carrito_id');
    }
}
