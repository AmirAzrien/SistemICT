<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

use App\Models\Permohonan;
use App\Observers\PermohonanObserver;

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
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        // Set bahasa Malaysia untuk Carbon
        Carbon::setLocale('ms');

        Paginator::useBootstrapFive(); // or useBootstrapFour() depending on your Bootstrap version

        Permohonan::observe(PermohonanObserver::class);
    }
}
