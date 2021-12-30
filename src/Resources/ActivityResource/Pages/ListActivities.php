<?php

namespace RyanChandler\FilamentSpatieLaravelActivitylog\Resources\ActivityResource\Pages;

use Filament\Resources\Pages\ListRecords;
use RyanChandler\FilamentSpatieLaravelActivitylog\Resources\ActivityResource;

class ListActivities extends ListRecords
{
    protected static string $resource = ActivityResource::class;
}
