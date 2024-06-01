<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaDeEntrada extends Model
{
    use HasFactory;

    protected $table = 'nota_de_entrada';
    public $timestamps = false;

    protected $fillable = [
        'numero', 
        'fecha', 
        'proveedor', 
        'total',
    ];

    public function detalleDeEntrada()
    {
        return $this->hasMany(DetalleEntrada::class, 'nota_de_entrada');
    }
}
