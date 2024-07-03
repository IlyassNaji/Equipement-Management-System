<?php

namespace Database\Factories;

use App\Models\Emplacement;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmplacementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'num_bureau' => $this->faker->unique()->randomElement(['1', '2', '3', '4', '5', '6','7','8']),
            'num_etage' => $this->faker->randomElement(['1', '2', '3', '4', '5', '6']),
            'nom_batiment' => $this->faker->randomElement(['A', 'B']),
        ];
    }
}
