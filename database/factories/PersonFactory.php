<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persons>
 */
class PersonFactory extends Factory
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
            'Ci' => $this->faker->numberBetween(1111111,2011111),
            'DrivingLicense' => $this->faker->numberBetween(1111111,2011111),
            'FirstName' => $this->faker->name(),
            'LastName' => $this->faker->lastName(),
            'SecondLastName' => $this->faker->lastName(),
            'BloodType' => $this->faker->bloodRh(),
            'CellPhone' => $this->faker->phoneNumber(),
            'Address' => $this->faker->address(),
            'photo' => $this->faker->imageUrl()
        ];
    }
}
