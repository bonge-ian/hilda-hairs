<?php

namespace Database\Seeders;

use App\Models\ProductVariation;
use App\Models\Stock;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stock::factory()
            ->count(300)
            ->sequence(
                fn ($sequence) => ['product_variation_id' => ProductVariation::get('id')->random()]
            )
            ->create();
    }
}
