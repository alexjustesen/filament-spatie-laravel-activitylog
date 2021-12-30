<?php

namespace RyanChandler\FilamentSpatieLaravelActivitylog;

use RyanChandler\FilamentSpatieLaravelActivitylog\Commands\FilamentSpatieLaravelActivitylogCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentSpatieLaravelActivitylogServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-spatie-laravel-activitylog')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_filament-spatie-laravel-activitylog_table')
            ->hasCommand(FilamentSpatieLaravelActivitylogCommand::class);
    }
}
