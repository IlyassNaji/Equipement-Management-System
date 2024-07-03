<?php

namespace Database\Factories;

use App\Models\Besoin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BesoinFactory extends Factory
{
    protected $model = Besoin::class;
     
    public function definition()
    {
        $status='PENDING';
        return [
            'type_besoin' => $this->faker->randomElement(['materiel informatique', 'immobilier', 'changement de bureau']),
            'status' => $status,
            'date_besoin' => $this->faker->date(),
            'description' => $this->faker->sentence,
            'user_id' => User::factory(),
            'id_equipement'=>\App\Models\Equipement::factory(),
        ];
    }
}
