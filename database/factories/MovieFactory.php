<?php

namespace Database\Factories;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Ambil genre acak dari database
        $genre = Genre::inRandomOrder()->first(); // Mengambil genre acak yang ada di database

        return [
            'title' => $this->faker->sentence(),
            'synopsis' => $this->faker->text(200),
            'poster' => $this->faker->imageUrl(640, 480, 'movies', true, 'poster'),
            'year' => $this->faker->numberBetween(1900, now()->year),
            'available' => $this->faker->boolean(),
            'genre_id' => $genre ? $genre->id : null, // Menambahkan genre_id yang valid, jika ada genre
        ];
    }
}
