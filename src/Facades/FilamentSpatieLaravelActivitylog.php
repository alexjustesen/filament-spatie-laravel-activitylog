<?php

namespace RyanChandler\FilamentSpatieLaravelActivitylog\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RyanChandler\FilamentSpatieLaravelActivitylog\FilamentSpatieLaravelActivitylog
 */
class FilamentSpatieLaravelActivitylog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'filament-spatie-laravel-activitylog';
    }
}
