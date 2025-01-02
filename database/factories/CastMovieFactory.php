<?php

namespace Database\Factories;

use App\Models\Casts;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CastMovieFactory extends Factory
{
    protected $model = \App\Models\CastMovie::class;

    public function definition()
    {
        return [
            'id' => Str::uuid(), // Menggunakan UUID untuk kolom id
            'movie_id' => Movie::factory(), // Asumsi Anda sudah memiliki MovieFactory
            'cast_id' => Casts::factory(),   // Asumsi Anda sudah memiliki CastFactory
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
