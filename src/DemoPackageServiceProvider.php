<?php

namespace Hdkhoasgt\DemoPackage;

use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

/**
 * Class DemoPackageServiceProvider
 * @package Hdkhoasgt\DemoPackage
 */
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
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Register the model factories
        $this->app->make('Illuminate\Database\Eloquent\Factory')
            ->load(__DIR__ . '/../database/factories');

        if ($this->app->runningInConsole()) {
            // php artisan vendor:publish --provider="Hdkhoasgt\DemoPackage\DemoPackageServiceProvider" --tag="migrations"
            if (!class_exists('CreateMessageLogsTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_message_logs_table.php.stub' => database_path('migrations/' . date('Y_m_d_His',
                            time()) . '_create_message_logs_table.php'),
                ], 'migrations');
            }

            // Publishing the configurations.
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

        // Register a macro, extending the Illuminate\Support\Collection class
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
