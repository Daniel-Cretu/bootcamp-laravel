<?php

namespace App\Providers;

use App\Services\DebugRequestActivityLogger;
use App\Services\DummyRequestActivityLogger;
use App\Services\ProductionRequestActivityLogger;
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
            if(strtolower(config('APP_ENV')) === 'production')
            {
                return $this->app->make(ProductionRequestActivityLogger::class);
            }
            return $this->app->make(DebugRequestActivityLogger::class);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('paginator.show');

        $this->app->bind(RequestActivityLoggerInterface::class, function () {
            return $this->app->make(DummyRequestActivityLogger::class);
            // Environment type. Return Debug or Production
        });
    }
}
