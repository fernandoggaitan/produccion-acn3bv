<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mascota>
 */
class MascotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'fecha_nacimiento' => fake()->date(),
            'telefono' => fake()->phoneNumber(),
            'categoria_id' => fake()->numberBetween(1, 3),
            'descripcion' => fake()->word(),
            'imagen' => fake()->imageUrl()
        ];
    }
}
