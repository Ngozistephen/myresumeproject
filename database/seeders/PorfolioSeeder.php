<?php

namespace Database\Seeders;

use App\Models\Porfolio;
use Illuminate\Database\Seeder;

class PorfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Porfolio::factory()->count(5)->create();
    }
}
