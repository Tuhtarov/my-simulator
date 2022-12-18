<?php

namespace App\Providers;

use App\Contracts\IPetAgingMachine;
use App\Services\PetAging;
use Illuminate\Support\ServiceProvider;

class PetServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IPetAgingMachine::class, PetAging::class);
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
