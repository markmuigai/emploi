<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Jenssegers\Agent\Agent;

// use App\Country;
// use App\Industry;
// use App\Location;
// use App\VacancyType;

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
        view()->composer('*', function ($view) {

            $view->with('agent',new Agent());

            // $view->with('all_countries', Country::active());
            // $view->with('all_locations', Location::active());
            // $view->with('all_industries', Industry::active());
            // $view->with('all_vacancy_types', VacancyType::all());

        });
    }
}
