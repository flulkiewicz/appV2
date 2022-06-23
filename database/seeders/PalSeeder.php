<?php

namespace Database\Seeders;

use App\Models\Pal;
use Illuminate\Database\Seeder;

class PalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pal::factory()->count(4)->create();
    }
}
