<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    public function definition(): array
{
    return [
        'id' => Str::uuid(), // Generate UUID
        'biodata' => $this->faker->paragraph(),
        'age' => $this->faker->numberBetween(18, 50),
        'address' => $this->faker->address(),
        'avatar' => $this->faker->imageUrl(640, 480),
        'user_id' => \App\Models\User::inRandomOrder()->first()->id, // Pastikan user_id valid
        'created_at' => now(),
        'updated_at' => now(),
    ];
}
};
