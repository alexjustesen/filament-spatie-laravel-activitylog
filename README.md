# View your activity logs inside of Filament.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/alexjustesen/filament-spatie-laravel-activitylog.svg?style=flat-square)](https://packagist.org/packages/alexjustesen/filament-spatie-laravel-activitylog)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/alexjustesen/filament-spatie-laravel-activitylog/run-tests?label=tests)](https://github.com/alexjustesen/filament-spatie-laravel-activitylog/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/alexjustesen/filament-spatie-laravel-activitylog/Check%20&%20fix%20styling?label=code%20style)](https://github.com/alexjustesen/filament-spatie-laravel-activitylog/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/alexjustesen/filament-spatie-laravel-activitylog.svg?style=flat-square)](https://packagist.org/packages/alexjustesen/filament-spatie-laravel-activitylog)

This package provides a Filament resource that shows you all of the activity logs created using the `spatie/laravel-activitylog` package. It also provides a relationship manager for related models.

## Installation

You can install the package via composer:

```bash
composer require alexjustesen/filament-spatie-laravel-activitylog
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-spatie-activitylog-config"
```

This is the contents of the published config file:

```php
return [

    'resource' => [
        'filament-resource' => AlexJustesen\FilamentSpatieLaravelActivitylog\Resources\ActivityResource::class,
        'group' => null,
        'sort'  => null,
    ],

    'paginate' => [5, 10, 25, 50],

];
```

## Usage

This package will automatically register the `ActivityResource` class specified in the configuration `resource.filament-resource`. You'll be able to see it when you visit your Filament admin panel.

## Customising the ActivityResource

You can swap out the `ActivityResource` used by publishing the configuration file and updating the `resource.filament-resource` value. Use this to create your own `ActivityResource` class and extend the original at `AlexJustesen\FilamentSpatieLaravelActivitylog\Resources\ActivityResource::class`. This will allow you to customise everything such as the views, table, form and permissions. If you wish to change the resource on List and View page be sure to replace the `getPages` method on the new resource and create your own version of the `ListPage` and `ViewPage` classes to reference the custom `ActivityResource`.

## Customising the group

You can customise the navigation group for the `ActivityResource` by publishing the configuration file and updating the `resource.group` value.

## Customising the sorting

You can customise the navigation group for the `ActivityResource` by publishing the configuration file and updating the `resource.sort` value.

## Relationship manager

If you have a model that uses the `Spatie\Activitylog\Traits\LogsActivity` trait, you can add the `AlexJustesen\FilamentSpatieLaravelActivitylog\RelationManagers\ActivitiesRelationManager` relationship manager to your Filament resource to display all of the activity logs that are performed on your model.

### Show the `subject` column on custom relation managers

When using the relationship manager the `subject` column isn't shown because the subject is the parent record. There are some cases (like when aggregating activities from child records) where the subject might be another record, and you want to show this column. In those cases you can add the next code to your relation manager:

```php
public function hideSubjectColumn(): bool
{
    return false;
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [RELEASES](https://github.com/alexjustesen/filament-spatie-laravel-activitylog/releases) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Alex Justesen](https://github.com/alexjustesen)
- [Ryan Chandler](https://github.com/ryangjchandler) (Original creator)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
