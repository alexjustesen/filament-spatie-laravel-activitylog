<?php

namespace RyanChandler\FilamentSpatieLaravelActivitylog\Resources\ActivityResource\Pages;

use RyanChandler\FilamentSpatieLaravelActivitylog\Resources\ActivityResource;
use Filament\Resources\Pages\ListRecords;

class ListActivities extends ListRecords
{
    protected static string $resource = ActivityResource::class;
}
