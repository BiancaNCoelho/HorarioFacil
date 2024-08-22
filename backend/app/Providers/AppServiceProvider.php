<?php

namespace App\Providers;

use App\Observers\AulaObserver;
use Illuminate\Support\ServiceProvider;
use App\Models\Aula;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Aula::observe(AulaObserver::class);
    }
}
