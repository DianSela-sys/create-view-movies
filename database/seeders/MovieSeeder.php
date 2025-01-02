<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre; // Mengambil model Genre untuk relasi
use Illuminate\Support\Str; // Untuk UUID jika diperlukan

class MovieSeeder extends Seeder
{
    public function run()
    {
        // Pastikan genres sudah di-seed terlebih dahulu
        $this->call(GenreSeeder::class);

        // Ambil semua genre yang tersedia
        $genres = Genre::all();

        // Cek apakah genre tersedia
        if ($genres->isEmpty()) {
            $this->command->info('No genres found, seeding aborted.');
            return;
        }

        // Menambahkan 10 film dengan genre yang sudah ada
        for ($i = 1; $i <= 10; $i++) {
            Movie::create([
                'title' => "Movie $i",
                'synopsis' => "This is the synopsis for Movie $i.",
                'poster' => "poster_$i.jpg", // Ganti dengan URL atau path valid
                'year' => rand(2000, 2024), // Tahun antara 2000-2024
                'available' => true,
                'genre_id' => $genres->random()->id, // Pilih genre secara acak
            ]);
        }
    }
}
