<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $fillable = [
        'id', 
        'nombre', 
        'descripcion'];
    use HasFactory;

    public function productos(){
        return $this->hasMany(producto::class,'id');
    }
    public $timestamps = false;
}
