<?php

namespace AlexJustesen\FilamentSpatieLaravelActivitylog;

use AlexJustesen\FilamentSpatieLaravelActivitylog\RelationManagers\ActivitiesRelationManager;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentSpatieLaravelActivitylogServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-spatie-activitylog';

    public function configurePackage(Package $package): void
    {
        $package->name(self::$name)
            ->hasConfigFile('filament-spatie-laravel-activitylog')
            ->hasTranslations();
    }

    public function packageBooted(): void
    {
        Livewire::component(ActivitiesRelationManager::class, ActivitiesRelationManager::class);
    }
}
