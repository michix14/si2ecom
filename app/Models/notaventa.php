<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notaventa extends Model
{   
    protected $fillable = ['cliente_id', 'total'];
    use HasFactory;
}
