<?php

// database/factories/EquipementFactory.php

namespace Database\Factories;

use App\Models\Equipement;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $numBureau = $this->faker->randomElement(['A', 'B']) . $this->faker->numberBetween(11, 68);
        $users=User::all()->count();
        return [
            'nom' => $this->faker->word,
            'categorie' => $this->faker->randomElement(['materiel informatique', 'immobilier', 'accessoires']),
            'marque' => $this->faker->word,
            'modele' => $this->faker->randomElement(['2022','2023','2024']),
            'numero_serie' => $this->faker->unique()->uuid,
            'date_achat' => $this->faker->date(),
            'description' => $this->faker->sentence,
            'état' => $this->faker->randomFloat(2, 0, 100),
            'image' => $this->faker->imageUrl(),
            'num_bureau' => $numBureau,
            'user_id'=>user::factory(),
        ];
    }
}
