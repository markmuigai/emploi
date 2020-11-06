<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        // Guest route
        $this->mapGuestRoutes();

        // Job seeker routes
        $this->mapJobSeekerRoutes();

            // Admin routes
        $this->mapAdminRoutes();

        // Auth v2 routes
        $this->mapAuthV2Routes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "authV2" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAuthV2Routes()
    {
        Route::prefix('v2')
             ->middleware('web')
             ->name('v2.')
             ->namespace('App\Http\Controllers\V2')
             ->group(base_path('routes/auth-v2.php'));
    }

    /**
     * Define the guest routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapGuestRoutes()
    {
        Route::prefix('v2')
             ->middleware('web')
             ->name('v2.guest.')
             ->namespace('App\Http\Controllers\Guest')
             ->group(base_path('routes/guest.php'));
    }

    /**
     * Define the guest routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapJobSeekerRoutes()
    {
        Route::prefix('v2')
             ->middleware('web')
             ->name('v2.')
             ->namespace('App\Http\Controllers\JobSeeker')
             ->group(base_path('routes/jobseeker.php'));
    }

        /**
     * Define admin routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::prefix('v2')
             ->middleware('web', 'admin')
             ->namespace('App\Http\Controllers\Admin')
             ->group(base_path('routes/admin.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
