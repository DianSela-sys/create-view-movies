<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CastMoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil genre yang ada
        $actionGenre = Genre::where('name', 'Action')->first();
        $dramaGenre = Genre::where('name', 'Drama')->first();

        // Pastikan genre ditemukan
        if (!$actionGenre || !$dramaGenre) {
            // Jika genre tidak ada, berhenti atau beri pesan error
            echo "Error: Genre not found!";
            return;
        }

        // Menambahkan movie dengan genre_id yang valid
        Movie::create([
            'id' => Str::uuid(),
            'title' => 'Movie Title 1',
            'synopsis' => 'Synopsis of Movie 1',
            'cover' => 'https://via.placeholder.com/640x480.png',
            'year' => 2024,
            'available' => true,
            'genre_id' => $actionGenre->id,  // Pastikan genre_id valid
        ]);

        Movie::create([
            'id' => Str::uuid(),
            'title' => 'Movie Title 2',
            'synopsis' => 'Synopsis of Movie 2',
            'cover' => 'https://via.placeholder.com/640x480.png',
            'year' => 2024,
            'available' => true,
            'genre_id' => $dramaGenre->id,  // Pastikan genre_id valid
        ]);
    }
}
