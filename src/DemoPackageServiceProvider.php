<?php

namespace Hdkhoasgt\DemoPackage;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class DemoPackageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'demo-package');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'demo-package');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('demo-package.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/demo-package'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/demo-package'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/demo-package'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }

        // Register a macro, extending the Illuminate\Collection class
        Collection::macro('rejectEmptyFields', function () {
            return $this->reject(function ($entry) {
                return $entry === null || $entry === '';
            });
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'demo-package');

        // Register the main class to use with the facade
        $this->app->singleton('demo-package', function () {
            return new DemoPackage;
        });
    }
}
