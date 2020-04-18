<?php

namespace Rappasoft\LaravelLivewireTables;

use Illuminate\Support\ServiceProvider;
use Rappasoft\LaravelLivewireTables\Commands\MakeTable;

/**
 * Class LivewireTablesServiceProvider.
 */
class LivewireTablesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([MakeTable::class]);
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-livewire-tables');

        $this->publishes([__DIR__ . '/../config/laravel-livewire-tables.php' => config_path('laravel-livewire-tables.php')], 'table-config');
        $this->publishes([__DIR__ . '/../resources/views' => resource_path('views/vendor/laravel-livewire-tables')], 'table-views');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-livewire-tables.php', 'laravel-livewire-tables');
    }
}
