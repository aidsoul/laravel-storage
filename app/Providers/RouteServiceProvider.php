<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/index';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            $path = 'routes/';
            // Route::middleware('api')
            //     ->prefix('api')
            //     ->group(base_path($path . 'api.php'));

            // Guest
            Route::middleware(['web', 'guest'])
                ->namespace($this->namespace)
                ->group(base_path($path . 'guest.php'));

            // User
            Route::middleware(['web', 'auth'])
                ->namespace($this->namespace)
                ->group(base_path($path . 'auth.php'));

            // Storage
            Route::middleware(['web', 'auth', 'verified', 'noblocked'])
                ->namespace($this->namespace . '\Storage')
                ->prefix('/storage')
                ->group(base_path($path . 'storage.php'));

            // Admin
            Route::middleware(['web', 'auth', 'verified', 'noblocked', 'admin'])
                ->namespace($this->namespace . '\Admin')
                ->prefix('/admin')
                ->group(base_path($path . 'admin.php'));

            // Drive
            Route::middleware(['web'])
                ->prefix('/file')
                ->group(base_path($path . 'drive.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
