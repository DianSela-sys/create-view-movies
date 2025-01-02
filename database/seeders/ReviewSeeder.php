<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure there are users and movies in the database first
        User::factory(10)->create(); // Create 10 users
        Movie::factory(10)->create(); // Create 10 movies

        // Now create 15 reviews, each related to a user and a movie
        Review::factory(15)->create();
    }
}
