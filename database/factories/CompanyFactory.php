<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
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
            'Nit' => $this->faker->numberBetween(1000000000,2100000000),
            'CompanyName' => $this->faker->company(),
            'OperatingLicense' => $this->faker->numberBetween(1000000000,2100000000),
            'Address' => $this->faker->address(),
            'Phone' => $this->faker->phoneNumber(),
            'logo' => $this->faker->name()
        ];
    }
}
