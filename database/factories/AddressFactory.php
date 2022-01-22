<?php

namespace Database\Factories;

use App\Models\County;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'city' => $this->faker->city(),
            'default' => $this->faker->boolean(),
            'postal_code' => $this->faker->postcode(),
            'address_1' => $this->faker->streetAddress(),
            'county_id' => County::get('id')->random(),
            'address_2' => $this->faker->optional()->streetAddress(),
        ];
    }
}
