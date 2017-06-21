<?php

namespace EloquentFilter;

use Illuminate\Support\ServiceProvider;

class LumenServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->app->singleton('command.eloquentfilter.make', function ($app) {
            return $app['EloquentFilter\Commands\MakeEloquentFilter'];
        });
        $this->commands('command.eloquentfilter.make');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->configure('eloquentfilter');

        $this->app->bind(ModelFilter::class, function () {
            $modelFilter = new ModelFilter();
            return $modelFilter;
        });

        $this->app->alias(ModelFilter::class, 'ModelFilter');
    }
}
