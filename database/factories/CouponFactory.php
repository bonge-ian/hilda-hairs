<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->word(6),
            'percentage_discount' => $this->faker->numberBetween(0, 100),
            'expiry' => $this->faker->dateTimeBetween('now', '+ 1 month'),
            'applied_count' => $this->faker->optional()->numberBetween(0, 100) ?? 0,
            'max_count' => $this->faker->numberBetween(100, 1000)
        ];
    }
}
