<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEntrada extends Model
{
    use HasFactory;

    protected $table = 'detalle_de_entrada';
    public $timestamps = false;

    protected $fillable = [
        'nota_de_entrada',
        'producto',
        'cantidad',
        'precio',
        'total',
    ];

    public function product()
    {
        return $this->belongsTo(Producto::class, 'producto');
    }
}
