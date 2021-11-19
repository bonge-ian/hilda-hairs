<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::factory()
            ->count(100)
            ->sequence(
                fn ($sequence) => [
                    'product_id' => Product::get('id')->random(),
                    'user_id' => $size = User::get('id')->random(),
                ]
            )
            ->create();
    }
}
