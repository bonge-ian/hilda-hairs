<?php

namespace App\Providers;

use Faker\{Factory, Generator};
use App\Faker\KenyanPhoneNumbers;
use Illuminate\Support\ServiceProvider;
use Spatie\Enum\Faker\FakerEnumProvider;

class FakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create();
            $faker->addProvider(new FakerEnumProvider($faker));

            return $faker;
        });

        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create();
            $faker->addProvider(new KenyanPhoneNumbers($faker));

            return $faker;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
