<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Michel Cárdenas',
            'email'=>'michixcard@gmail.com',
            'password'=>bcrypt('123456789')
        ])->assignRole('admin');

        User::create([
            'name'=>'David Soliz',
            'email'=>'david@gmail.com',
            'password'=>bcrypt('123456789')
        ])->assignRole('admin');

        User::create([
            'name'=>'David Chalar',
            'email'=>'david@prueba.com',
            'password'=>bcrypt('123456789')
        ])->assignRole('admin');
    }
}
