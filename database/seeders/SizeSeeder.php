<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(16,32) as $index => $size){
            Size::factory()
                ->sequence([
                    'name' => $size,
                    'order' => $index
                ])
                ->create();
        }
    }
}
