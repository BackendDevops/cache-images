<?php

namespace Kvnc\CacheImages;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Kvnc\CacheImages\Http\Middleware\CacheImageMiddleware;

class CacheImageProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/route.php');

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $router->aliasMiddleware('image-cache',CacheImageMiddleware::class);
        $this->publishes([
            __DIR__.'/config/cache-image.php' => config_path('cache-image')
            , 'config'
        ]);
    }
}
