<?php

namespace Database\Seeders;

use App\Models\categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   $categorias = [
        ['nombre' => 'Televisores', 'descripcion' => 'Televisores de alta definición'],
        ['nombre' => 'Computadoras', 'descripcion' => 'Computadoras portátiles y de escritorio'],
        ['nombre' => 'Teléfonos', 'descripcion' => 'Teléfonos inteligentes'],
        // Agrega más categorías aquí...
    ];

    foreach ($categorias as $categoria) {
        categoria::create($categoria);
    }
    }
}
