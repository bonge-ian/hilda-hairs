<?php

namespace Database\Seeders;

use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\ProductVariation;

class ProductVariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductVariation::factory(1000)
            ->sequence(
                fn ($sequence) => [
                    'product_id' => Product::get('id')->random(),
                    'size_id' => $size = Size::get(['name', 'id'])->random(),
                    'color_id' => $color = Color::get(['name', 'id'])->random(),
                    'name' => Str::snake("{$size->name} {$color->name}", "-")
                ]
            )
            ->create();
    }
}
