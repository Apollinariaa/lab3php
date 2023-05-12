<?php

namespace Database\Factories;
use App\Models\Street;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Street>
 */

class StreetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->text(30),
			'city' => $this->faker->text(20),
			'km' => $this->faker->randomNumber(3, false),
        ];
    }
}
