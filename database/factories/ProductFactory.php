<?php

namespace Database\Factories;

use App\Enums\HairTypeEnum;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $name = $this->faker->unique()->name(),
            'category_id' => Category::get('id')->random(),
            'slug' => Str::slug($name),
            'caption' => $this->faker->text(),
            'type' => $this->faker->randomEnum(HairTypeEnum::class),
            'price' => $this->faker->numberBetween($min = 100_000, $max = 10000000),
            'description' => $this->faker->paragraphs(6, true),
            'order' => $this->faker->randomDigitNotNull(),
            'is_viewable' => $this->faker->boolean(),
            'cover_image_url' => function () {
                $img = $this->faker->numberBetween(1, 22);

                return "img/{$img}.jpg";
            },
            'images' => function () {
                $images = [];
                foreach (range(1, $this->faker->numberBetween(3, 6)) as $range) {

                    $images = Arr::add(
                        $images,
                        $range,
                        "img/{$this->faker->numberBetween(1,22)}.jpg"
                    );
                }
                return $images;
            }
        ];
    }
}
