<?php

namespace Database\Factories;

use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductVariation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductVariationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductVariation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name(),
            'product_id' => Product::get('id')->random(),
            'price' => $this->faker->numberBetween($min = 100_000, $max = 10000000),
            'order' => $this->faker->randomDigitNotNull(),
            'size_id' => Size::get('id')->random(),
            'color_id' => Color::get('id')->random()
        ];
    }
}
