<?php

namespace RyanChandler\FilamentSpatieLaravelActivitylog;

use RyanChandler\FilamentSpatieLaravelActivitylog\Commands\FilamentSpatieLaravelActivitylogCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentSpatieLaravelActivitylogServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-spatie-laravel-activitylog');
    }
}
