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
            $client = SaasuAPI::createClient(config('saasu.fileID'), config('saasu.username'));
            return new SaasuAPI($client, config('saasu.fileID'));
        });
    }

    /**
     * In boot, do anything else that is required. This is run
     * after all the services have been registered.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/saasu.php' => config_path('saasu.php'),
        ]);
    }

}