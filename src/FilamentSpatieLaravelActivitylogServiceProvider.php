<?php

namespace AlexJustesen\FilamentSpatieLaravelActivitylog;

use AlexJustesen\FilamentSpatieLaravelActivitylog\RelationManagers\ActivitiesRelationManager;
use AlexJustesen\FilamentSpatieLaravelActivitylog\Resources\ActivityResource;
use Filament\PluginServiceProvider;
use Livewire\Livewire;
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
            config('filament-spatie-laravel-activitylog.resource.filament-resource') ?? ActivityResource::class,
        ];
    }

    public function packageBooted(): void
    {
        parent::packageBooted();

        Livewire::component(ActivitiesRelationManager::getName(), ActivitiesRelationManager::class);
    }
}
