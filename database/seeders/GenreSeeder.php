<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;
use Illuminate\Support\Str; // Untuk UUID

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        // Daftar genre yang akan di-seed
        $genres = ['Action', 'Drama', 'Comedy', 'Horror', 'Romance', 'Thriller'];

        foreach ($genres as $genre) {
            Genre::create([
                'id' => Str::uuid(), // Menggunakan UUID untuk primary key
                'name' => $genre,
            ]);
        }
    }
}
