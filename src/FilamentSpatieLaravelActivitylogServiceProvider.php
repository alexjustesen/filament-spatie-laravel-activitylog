<?php

namespace RyanChandler\FilamentSpatieLaravelActivitylog;

use Filament\PluginServiceProvider;
use Livewire\Livewire;
use RyanChandler\FilamentSpatieLaravelActivitylog\RelationManagers\ActivitiesRelationManager;
use RyanChandler\FilamentSpatieLaravelActivitylog\Resources\ActivityResource;
use Spatie\LaravelPackageTools\Package;

class FilamentSpatieLaravelActivitylogServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-spatie-activitylog';

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
