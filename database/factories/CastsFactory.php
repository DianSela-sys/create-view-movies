<?php

namespace Database\Factories;

use App\Models\Casts;
use Illuminate\Database\Eloquent\Factories\Factory;

class CastsFactory extends Factory
{
    protected $model = Casts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid(),  // Menggunakan UUID
            'name' => $this->faker->name(),
            'age' => $this->faker->numberBetween(30, 80),
            'biodata' => $this->faker->paragraph(),
            'avatar' => $this->faker->imageUrl(),
        ];
    }
}
