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
        $this->app->bind(RequestActivityLoggerInterface::class, function () {
            return $this->app->make(DummyRequestActivityLogger::class);
            // Environment type. Return sau Debug sau Production
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('molecules/paginator');
//        Paginator::defaultView('molecules/paginator-simple');
    }
}
