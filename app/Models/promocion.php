<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promocion extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nombre',
        'precio_descuento',
        'fecha_inicio',
        'fecha_fin',
        'id_producto',
    ];
    public $timestamps = false;
    public function producto()
    {
        return $this->belongsTo(producto::class, 'id_producto');
    }
}
