<?php

namespace Database\Seeders;

use App\Models\Casts;
use Illuminate\Database\Seeder;

class CastsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat 15 record data untuk casts
        Casts::factory(15)->create();
    }
}
