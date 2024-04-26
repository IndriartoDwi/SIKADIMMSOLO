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
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/check-access';

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

        Route::middleware(['web', 'auth'])->group(function () {
            $this->mapDashboardRoutes();

            $this->mapUserRoutes();

            $this->mapMenuRoutes();

            $this->mapOtoritasRoutes();

            $this->mapDokumenRoutes();

            $this->mapKaderRoutes();

            $this->mapKampusRoutes();

            $this->mapCabangRoutes();

            $this->mapKomisariatRoutes();

            $this->mapFakultasRoutes();

            $this->mapProdiRoutes();

            $this->mapTimelineRoutes();
        });
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

    protected function mapDashboardRoutes()
    {
        Route::prefix('dashboard')
            ->namespace($this->namespace)
            ->group(base_path('routes/panel/dashboard.php'));
    }

    protected function mapUserRoutes()
    {
        Route::prefix('users')
            ->namespace($this->namespace)
            ->group(base_path('routes/panel/users.php'));
    }

    protected function mapMenuRoutes()
    {
        Route::prefix('manajemen-menu')
            ->namespace($this->namespace)
            ->group(base_path('routes/panel/menu.php'));
    }

    protected function mapOtoritasRoutes()
    {
        Route::prefix('otoritas')
            ->namespace($this->namespace)
            ->group(base_path('routes/panel/otoritas.php'));
    }

    protected function mapDokumenRoutes()
    {
        Route::prefix('dokumen')
            ->namespace($this->namespace)
            ->group(base_path('routes/panel/dokumen.php'));
    }

    protected function mapKaderRoutes()
    {
        Route::prefix('kader')
            ->namespace($this->namespace)
            ->group(base_path('routes/panel/kader.php'));
    }

    protected function mapKampusRoutes()
    {
        Route::prefix('kampus')
            ->namespace($this->namespace)
            ->group(base_path('routes/panel/referensi/kampus.php'));
    }

    protected function mapCabangRoutes()
    {
        Route::prefix('cabang')
            ->namespace($this->namespace)
            ->group(base_path('routes/panel/referensi/cabang.php'));
    }

    protected function mapKomisariatRoutes()
    {
        Route::prefix('komisariat')
            ->namespace($this->namespace)
            ->group(base_path('routes/panel/referensi/komisariat.php'));
    }

    protected function mapTimelineRoutes()
    {
        Route::prefix('timeline')
            ->namespace($this->namespace)
            ->group(base_path('routes/panel/timeline.php'));
    }

    protected function mapFakultasRoutes()
    {
        Route::prefix('fakultas')
            ->namespace($this->namespace)
            ->group(base_path('routes/panel/referensi/fakultas.php'));
    }

    protected function mapProdiRoutes()
    {
        Route::prefix('program-studi')
            ->namespace($this->namespace)
            ->group(base_path('routes/panel/referensi/prodi.php'));
    }
}
