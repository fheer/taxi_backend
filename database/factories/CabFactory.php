<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cab>
 */
class CabFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'Model' => $this->faker->name(),
            'LicensePlate' => $this->faker->numberBetween(10000000,19000000),
            'CarChassis' => $this->faker->numberBetween(10000000,19000000),
            'Color' => $this->faker->colorName(),
            'Left' => $this->faker->name(),
            'Right' => $this->faker->name(),
            'Front' => $this->faker->name(),
            'Back' => $this->faker->name(),
            'Up' => $this->faker->name()
        ];
    }
}
