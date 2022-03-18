<?php

namespace AlexJustesen\FilamentSpatieLaravelActivitylog\Tests;

use AlexJustesen\FilamentSpatieLaravelActivitylog\FilamentSpatieLaravelActivitylogServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'AlexJustesen\\FilamentSpatieLaravelActivitylog\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            FilamentSpatieLaravelActivitylogServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_filament-spatie-laravel-activitylog_table.php.stub';
        $migration->up();
        */
    }
}
