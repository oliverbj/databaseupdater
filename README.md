# XML to Database

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

\DatabaseUpdater::update(['xml' => 'XMLFileString', 'UniqueValue' => 'CDK12345678']);
```
The update method require two indexes: `xml` and `UniqueValue`. The `xml` should contain the XML file as a string and the `UniqueValue` should contain the value we should check against in the database. 

The default database connection and table from the configuration is used by default, but you can specify your own programmaticaly:

```php
\DatabaseUpdater::database('IliadQA')
                  ->table('Consols')
                  ->update(['xml' => 'XMLFileString', 'UniqueValue' => 'CDK12345678']);
```

## Configuration

The package is quite simple to get started with. You can specify the `database` and `table` settings in the config file:

```php
//config/databaseupdater.php
'databases' => [
        'IliadQA' => [
            'tables' => [
                'Consols' => [
                    'UpdateKey' => 'consolID',
                    'Columns' => [
                        'consolID' => ['uses' => 'TransportMaster.TransportMasterId', 'default' => 'Blabla'],
                        'firstLeg' => [],
                        //etc.
                    ],

                ],
            ],
        ],
];
```

# Multidimensional XML tag parsing

Sometimes you might encounter nested XML tags with the same tag name, where you only need one of the tags. 
For example in the below example, we might only need the `MasterBill` tag:

```php
[▼
  [▼
    "TransportMasterId" => "CDK439089"
    "MasterBill" => "172-41625032"
    "BookingReference" => null
    "ExternalAgentReference" => "9,00"
    "PaymentType" => "PPD"
    "IsCancelled" => "false"
    "ProcessDirection" => "Export"
    "GAT" => "dk"
    "PPC" => "133346862"
    "Friday Flight" => "false"
    "Monday Flight" => "false"
    "Thursday Flight" => "false"
    "Tuesday Flight" => "false"
    "Wednesday Flight" => "false"
  ]
];
```

You can specify an `index` key in the config file, like so:

```php
'master' => ['uses' => 'TransportMaster.TransportMasterReferences[Reference(::Type=@)]', 'index' => 'MasterBill'],
```

This will ultimately remove all other items in the array, and set `master` to the value of the `MasterBill` tag.

**Please note, you can only specify an index one level down.**

# Applying parsing rules

You can specify different rules to the XML parser, which will be applied to the specific tag text value. For example:

```php
  'firstLoadCountry' => ['uses' => 'TransportMaster.TransportStages.Stage[Locations.Location(::Type=Code)]', 'Index' => 'Loading', 'default' => '', 'Rule' => 'substring', 'Arguments' => ['start' => 0, 'end' => 2]],
```

This will ultimately apply the method `substring($arguments)` to the specific tag value.

The XML parsing rules is using `orchestra/parser` under the hood, and must be specified in this format. Example:

```php
'uses' => 'TransportMaster.TransportMasterId', 'default' => 'Blabla'],
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
