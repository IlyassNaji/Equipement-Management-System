<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Equipement;
use App\Models\Emplacement;
use App\Models\Besoin;
use App\Models\Maintenance;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed users
        User::factory(30)->create();
        Equipement::factory(30)->create();
        Besoin::factory(30)->create();
        Maintenance::factory(30)->create();
        }
}
