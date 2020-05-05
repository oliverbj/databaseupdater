# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/oliverbj/databaseupdater.svg?style=flat-square)](https://packagist.org/packages/oliverbj/databaseupdater)
[![Build Status](https://img.shields.io/travis/oliverbj/databaseupdater/master.svg?style=flat-square)](https://travis-ci.org/oliverbj/databaseupdater)
[![Quality Score](https://img.shields.io/scrutinizer/g/oliverbj/databaseupdater.svg?style=flat-square)](https://scrutinizer-ci.com/g/oliverbj/databaseupdater)
[![Total Downloads](https://img.shields.io/packagist/dt/oliverbj/databaseupdater.svg?style=flat-square)](https://packagist.org/packages/oliverbj/databaseupdater)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require oliverbj/databaseupdater
```

## Usage

This package can be used to parse an XML file and add the values directly into a database table.

``` php
    use Oliverbj\DatabaseUpdater\Facade;

    \DatabaseUpdater::database('IliadQA')
                     ->table('Consols')
                     ->update(['xml' => $this->xml(true), 'UniqueValue' => 'CDK12345678']);
```

You can export the default config file by running this command:

```php
php artisan vendor:publish --provider="oliverbj\DatabaseUpdater\DatabaseUpdaterServiceProvider" --tag="config"
```



### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email oliver.busk.jensen@dk.dsv.com instead of using the issue tracker.

## Credits

- [Oliver Busk Jensen](https://github.com/oliverbj)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
