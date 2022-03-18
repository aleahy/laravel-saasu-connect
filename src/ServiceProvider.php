<?php

namespace Aleahy\LaravelSaasuConnect;

use Aleahy\SaasuConnect\SaasuAPI;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * In register, only bind things to the container
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/saasu.php',
            'saasu'
        );

        $this->app->singleton(SaasuAPI::class, function() {
            $client = SaasuAPI::createClient(config('saasu.username'), config('saasu.password'));
            return new SaasuAPI($client, config('saasu.fileID'));
        });
    }

    /**
     * In boot, do anything else that is required. This is run
     * after all the services have been registered.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            if (! class_exists('CreateSaasuEntitiesTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_saasu_entities_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_saasu_entities_table.php')
                ], 'migrations');
            }
        }

        $this->publishes([
            __DIR__.'/../config/saasu.php' => config_path('saasu.php'),
        ], 'config');
    }

}