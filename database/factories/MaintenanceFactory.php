<?php

namespace Database\Factories;

use App\Models\Maintenance;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaintenanceFactory extends Factory
{
    protected $model = Maintenance::class;

    public function definition()
    {
        return [
            'cout_maintenance' => $this->faker->randomFloat(2, 100, 10000),
            'date_maintenance' => $this->faker->date(),
            'status' => 'PENDING',
            'type_maintenance' => $this->faker->randomElement(['corrective','preventive','autre']),
            'description' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(),
            'user_id' => \App\Models\User::factory(),
            'id_equipement'=>\App\Models\Equipement::factory(),
        ];
    }
}
