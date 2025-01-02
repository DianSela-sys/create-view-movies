<?php

namespace Database\Factories;


use App\Models\Review;
use App\Models\User;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition()
    {
        return [
            'id' => (string) Str::uuid(),
            'review' => $this->faker->paragraph(),
            'rating' => $this->faker->numberBetween(1, 5),
            'user_id' => User::factory(), // Assumes the user factory is defined
            'movie_id' => Movie::factory(), // Assumes the movie factory is defined
        ];
    }
}
