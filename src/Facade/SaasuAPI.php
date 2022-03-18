<?php


namespace Aleahy\LaravelSaasuConnect\Facade;
use Aleahy\LaravelSaasuConnect\Testing\SaasuAPIFake;
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

    public static function fake()
    {
        static::swap($fake = new SaasuAPIFake());
        return $fake;
    }
}