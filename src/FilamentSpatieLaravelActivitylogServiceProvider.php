<?php

namespace RyanChandler\FilamentSpatieLaravelActivitylog;

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
