<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Categoria::create([
            'nombre' => 'Gatos',
            'descripcion' => 'Felinos de cuatro patas'
        ]);

        Categoria::create([
            'nombre' => 'Perros',
            'descripcion' => 'Caninos de cuatro patas'
        ]);

        Categoria::create([
            'nombre' => 'Tortuas',
            'descripcion' => 'Reptiles de cuatro patas'
        ]);

    }
}
