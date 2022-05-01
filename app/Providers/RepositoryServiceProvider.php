<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Repositories\Eloquent\CodeRepository;
use App\Domain\Repositories\Eloquent\CallPriceRepository;
use App\Domain\Repositories\Interfaces\CodeRepositoryInterface;
use App\Domain\Repositories\Interfaces\CallPriceRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CodeRepositoryInterface::class, CodeRepository::class);
        $this->app->bind(CallPriceRepositoryInterface::class, CallPriceRepository::class);
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
