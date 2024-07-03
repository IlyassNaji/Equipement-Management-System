<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Besoin;

class BesoinSeeder extends Seeder
{
    public function run()
    {
        Besoin::factory()->count(30)->create();
    }
}
