<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(50)->create();

        // should be run in this order
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            SizeSeeder::class,
            ColorSeeder::class,
            ProductVariationSeeder::class,
            StockSeeder::class,
            ReviewSeeder::class,
            CouponSeeder::class,
            CountrySeeder::class,
            CountySeeder::class,
        ]);
    }
}
