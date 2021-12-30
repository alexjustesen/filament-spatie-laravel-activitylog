<?php

namespace RyanChandler\FilamentSpatieLaravelActivitylog;

use Filament\PluginServiceProvider;
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
}
