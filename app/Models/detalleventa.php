<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalleventa extends Model
{   
    protected $fillable = ['venta_id', 'producto_id', 'cantidad', 'precio'];
    use HasFactory;

    public function producto()
    {
        return $this->belongsTo(producto::class, 'producto_id');
    }
}
