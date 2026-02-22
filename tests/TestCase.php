<?php

namespace Aleahy\LaravelSaasuConnect\Tests;
use Aleahy\LaravelSaasuConnect\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\LaravelRay\RayServiceProvider;

class TestCase extends Orchestra
{
    use RefreshDatabase;

    protected Entity $testEntity;

    public function setUp(): void
    {
        parent::setUp();
        $this->setUpDatabase($this->app);
        $this->testEntity = Entity::first();

    }

    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
            RayServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        Relation::morphMap([
            'morph_entity' => Entity::class,
        ]);

        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    protected function setUpDatabase(Application $app)
    {
        $app['db']->connection()->getSchemaBuilder()->create('entities', function (Blueprint $table) {
            $table->increments('id');
        });

        include_once __DIR__ . '/../database/migrations/create_saasu_entities_table.php.stub';

        (new \CreateSaasuEntitiesTable())->up();

        Entity::create();
    }
}