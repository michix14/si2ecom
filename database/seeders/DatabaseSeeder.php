<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);// llama al seeder proveedor
        $this->call(UserSeeder::class);// llama al seeder usuario
        $this->call(categoriasSeeder::class);// llama al seeder categorias
        $this->call(marcasSeeder::class);// llama al seeder marcas

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
