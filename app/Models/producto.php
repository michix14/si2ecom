<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nombre',
        'stock',
        'descripcion',
        'precioventa',
        'imagen_url',
        'id_marca',
        'id_categoria',
    ];

    public function marcas(){
        return $this->belongsTo(marca::class,'id_marca');
    }

    public function categorias(){
        return $this->belongsTo(categoria::class,'id_categoria');
    }
    public function promotions()
    {
        return $this->hasMany(promocion::class, 'id_producto');
    }

    public $timestamps = false;
}
