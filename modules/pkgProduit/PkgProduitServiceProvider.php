<?php

namespace Modules\pkgProduit;

use Illuminate\Support\ServiceProvider;

class PkgProduitServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__."/Views","pkgProduit");
        $this->publishes([__DIR__."/Views" => resource_path("views/vendor/pkgproduit")],"PkgProduit-view");
    }
}
