<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::factory()
            ->count(20)
            ->sequence(
                fn ($sequence) => [
                    'addressable_id' => $user = User::get('id')->random(),
                    'addressable_type' => $user->getMorphClass()
                ]
            )
            ->create();
    }
}
