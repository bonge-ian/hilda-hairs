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
        $stocks = Stock::factory()
            ->count(3000)
            ->sequence(
                fn ($sequence) => ['product_variation_id' => ProductVariation::distinct()->get('id')->random()]
            )
            ->make();

        $chunks = $stocks->chunk(500);
        $chunks->each(
            fn ($chunk) => Stock::insert($chunk->toArray())
        );
    }
}
