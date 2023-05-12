<?php

namespace Database\Factories;
use App\Models\House;
use App\Models\Street;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\House>
 */
class HouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rand_street = Street::all()->random();

        return [
            'street_id' => $rand_street->id,
			'house_number' => $this->faker->randomNumber(3, false),
			'house_type' => $this->faker->text(20), 
            'number_of_floors' => $this->faker->randomNumber(3, false), 
            'active_from' => $this->faker->date(),
            'active_to' => $this->faker->date(),
        ];
    }
}
