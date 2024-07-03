<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Equipement;

class EquipementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Equipement::factory()->count(50)->create();
    }
}
