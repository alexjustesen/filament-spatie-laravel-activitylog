<?php

namespace AlexJustesen\FilamentSpatieLaravelActivitylog;

use Filament\Facades\Filament;

final class ResourceFinder
{
    public static function find(string $class): ?string
    {
        $resources = Filament::getResources();

        foreach ($resources as $resource) {
            $model = $resource::getModel();

            if ($model === $class) {
                return $resource;
            }
        }

        return null;
    }
}
