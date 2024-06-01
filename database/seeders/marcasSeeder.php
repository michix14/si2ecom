<?php

namespace Database\Seeders;

use App\Models\marca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class marcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marcas = [
            ['nombre' => 'Samsung', 'descripcion' => 'Marca de electrónica'],
            ['nombre' => 'Apple', 'descripcion' => 'Marca de electrónica'],
            ['nombre' => 'Dell', 'descripcion' => 'Marca de electrónica'],
            // Agrega más marcas aquí...
        ];

        foreach ($marcas as $marca) {
            marca::create($marca);
        }
    }
}
