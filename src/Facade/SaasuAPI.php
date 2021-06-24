<?php


namespace Aleahy\LaravelSaasuConnect\Facade;
use Illuminate\Support\Facades\Facade;

class SaasuAPI extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     */
    protected static function getFacadeAccessor()
    {
        return \Aleahy\SaasuConnect\SaasuAPI::class;
    }
}