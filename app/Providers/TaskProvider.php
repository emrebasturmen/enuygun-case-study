<?php

namespace App\Providers;

use App\ApiProviders\ProviderOne;
use App\ApiProviders\ProviderTwo;
use App\Interfaces\ProviderOneInterface;
use App\Interfaces\ProviderTwoInterface;
use Illuminate\Support\ServiceProvider;

class TaskProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProviderOneInterface::class, ProviderOne::class);
        $this->app->bind(ProviderTwoInterface::class, ProviderTwo::class);
    }
}
