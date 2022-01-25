<?php

namespace App\Providers;

use App\Services\DummyRequestActivityLogger;
use App\Services\RequestActivityLoggerInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(RequestActivityLoggerInterface::class, function () {
            return $this->app->make(DummyRequestActivityLogger::class);
            // Environment type. Return Debug or Production
        });
    }
}
