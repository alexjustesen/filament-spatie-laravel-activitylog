# View your activity logs inside of Filament.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ryangjchandler/filament-spatie-laravel-activitylog.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/filament-spatie-laravel-activitylog)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/ryangjchandler/filament-spatie-laravel-activitylog/run-tests?label=tests)](https://github.com/ryangjchandler/filament-spatie-laravel-activitylog/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/ryangjchandler/filament-spatie-laravel-activitylog/Check%20&%20fix%20styling?label=code%20style)](https://github.com/ryangjchandler/filament-spatie-laravel-activitylog/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ryangjchandler/filament-spatie-laravel-activitylog.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/filament-spatie-laravel-activitylog)

This package provides a Filament resource that shows you all of the activity logs created using the `spatie/laravel-activitylog` package. It also provides a relationship manager for related models.

## Installation

You can install the package via composer:

```bash
composer require ryangjchandler/filament-spatie-laravel-activitylog
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-spatie-activitylog-config"
```

This is the contents of the published config file:

```php
return [

    'resource' => [
        'group' => null,
        'sort' => null,
    ],

];
```

## Usage

This package will automatically register the `ActivityResource`. You'll be able to see it when you visit your Filament admin panel.

## Customising the group

You can customise the navigation group for the `ActivityResource` by publishing the configuration file and updating the `resource.group` value.

## Customising the sorting

You can customise the navigation group for the `ActivityResource` by publishing the configuration file and updating the `resource.sort` value.

## Relationship manager

If you have a model that uses the `Spatie\Activitylog\Traits\LogsActivity` trait, you can add the `RyanChandler\FilamentSpatieLaravelActivitylog\RelationManagers\ActivitiesRelationManager` relationship manager to your Filament resource to display all of the activity logs that are performed on your model.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ryan Chandler](https://github.com/ryangjchandler)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
