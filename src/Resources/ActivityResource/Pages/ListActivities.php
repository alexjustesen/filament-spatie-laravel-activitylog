<?php

namespace AlexJustesen\FilamentSpatieLaravelActivitylog\Resources\ActivityResource\Pages;

use Filament\Resources\Pages\ListRecords;
use AlexJustesen\FilamentSpatieLaravelActivitylog\Resources\ActivityResource;

class ListActivities extends ListRecords
{
    protected static string $resource = ActivityResource::class;
}
