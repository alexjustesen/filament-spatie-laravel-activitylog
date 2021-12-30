<?php

namespace RyanChandler\FilamentSpatieLaravelActivitylog;

use Filament\PluginServiceProvider;
use Livewire\Livewire;
use RyanChandler\FilamentSpatieLaravelActivitylog\RelationManagers\ActivitiesRelationManager;
use RyanChandler\FilamentSpatieLaravelActivitylog\Resources\ActivityResource;

class FilamentSpatieLaravelActivitylogServiceProvider extends PluginServiceProvider
{
    public static string $name = 'spatie-activitylog';

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
