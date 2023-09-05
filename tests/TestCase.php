<?php

namespace AlexJustesen\FilamentSpatieLaravelActivitylog\Tests;

use AlexJustesen\FilamentSpatieLaravelActivitylog\FilamentSpatieLaravelActivitylogServiceProvider;
use Filament\FilamentServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\Activitylog\ActivitylogServiceProvider;

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
            LivewireServiceProvider::class,
            FilamentServiceProvider::class,
            ActivitylogServiceProvider::class,
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
