<?php

namespace AlexJustesen\FilamentSpatieLaravelActivitylog;

use AlexJustesen\FilamentSpatieLaravelActivitylog\Resources\ActivityResource;
use Filament\Contracts\Plugin;
use Filament\Panel;

class FilamentSpatieLaravelActivitylogPlugin implements Plugin
{
    public function getId(): string
    {
        return FilamentSpatieLaravelActivitylogServiceProvider::$name;
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            config('filament-spatie-laravel-activitylog.resource.filament-resource') ?? ActivityResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
    }
}
