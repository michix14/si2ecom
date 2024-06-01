<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_carritoventa extends Model
{
    use HasFactory;

    protected $table = 'detalle_carritoventas'; // Nombre de la tabla
    protected $fillable = ['carrito_id', 'producto_id', 'cantidad', 'precio']; // Campos que se pueden asignar

    public function carrito()
    {
        return $this->belongsTo(carritoventa::class, 'carrito_id');
    }

    public function producto()
    {
        return $this->belongsTo(producto::class, 'producto_id');
    }
}