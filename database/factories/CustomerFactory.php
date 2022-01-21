<?php

namespace Database\Factories;

use Propaganistas\LaravelPhone\PhoneNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'email' => $this->faker->safeEmail(),
            'phone' => PhoneNumber::make($this->faker->kePhoneNumbers(), 'KE')->formatForCountry('KE'),
        ];
    }
}
