<?php

namespace App\Providers;

use App\Models\Event;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrapFive();
        Schema::defaultStringLength(191);
        if (Schema::hasTable('general_settings')) {
            $general = gs();
            $viewShare['general'] = $general;
            $events = Event::query()->latest()->get();
            if(!$events){
                $events = [];
            }
            $viewShare['events'] = $events;
            view()->share($viewShare);
        }
    }
}
