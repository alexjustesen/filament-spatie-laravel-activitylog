<?php

namespace RyanChandler\FilamentSpatieLaravelActivitylog;

use Livewire\Livewire;
use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;
use RyanChandler\FilamentSpatieLaravelActivitylog\Resources\ActivityResource;
use RyanChandler\FilamentSpatieLaravelActivitylog\RelationManagers\ActivitiesRelationManager;

class FilamentSpatieLaravelActivitylogServiceProvider extends PluginServiceProvider
{
    public static string $name = 'spatie-activitylog';

    public function configurePackage(Package $package): void
    {
        parent::configurePackage($package);

        $package->hasConfigFile('filament-spatie-laravel-activitylog');
    }

    protected function getResources(): array
    {
        return [
            ActivityResource::class,
        ];
    }

    public function packageBooted(): void
    {
        parent::packageBooted();

        Livewire::component(ActivitiesRelationManager::getName(), ActivitiesRelationManager::class);
    }
}
