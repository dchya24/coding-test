<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ekskul>
 */
class EkskulFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ekskul = ['Sepak Bola', 'Bulu Tangkis', 'Futsal', 'Nari', 'KIR', 'Basket', 'Voli', 'Karate'];
        return [
            'nama' => $ekskul[rand(0, count($ekskul) - 1)],
            'tahun' => fake()->year(2023),
        ];
    }
}
