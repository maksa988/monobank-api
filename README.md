# Monobank API Client

[![Latest Stable Version](https://poser.pugx.org/maksa988/monobank-api/v/stable)](https://packagist.org/packages/maksa988/monobank-api)
[![Build Status](https://travis-ci.org/maksa988/monobank-api.svg?branch=master)](https://travis-ci.org/maksa988/monobank-api)
[![StyleCI](https://github.styleci.io/repos/193751164/shield?branch=master)](https://github.styleci.io/repos/193751164)
[![Total Downloads](https://img.shields.io/packagist/dt/maksa988/monobank-api.svg?style=flat-square)](https://packagist.org/packages/maksa988/monobank-api)
[![License](https://poser.pugx.org/maksa988/monobank-api/license)](https://packagist.org/packages/maksa988/monobank-api)

PHP client for MonoBank API services (https://api.monobank.ua/docs/)

- List of monobank currency rates
- Information about the client and the list of his accounts
- Get statement

#### PHP >= 5.6.4

## Installation

Monobank API for PHP is installed via [Composer](https://getcomposer.org/).
For most uses, you will need to require `maksa988/monobank-api` and an individual gateway:

```bash
composer require maksa988/monobank-api
```

## Usage

```php
use Maksa988\MonobankAPI\MonobankAPI;

$api = new MonobankAPI('YOUR_TOKEN');

/*
 * Get currencies
 * 
 * Returns array of \Maksa988\MonobankAPI\DTO\CurrencyInfo instainces
 */
$api->currency();

/*
 * Get information about client
 * 
 * Returns instance of \Maksa988\MonobankAPI\DTO\UserInfo
 */
$api->personalInfo();

/*
 * Get personal statement
 * 
 * Returns instance of \Maksa988\MonobankAPI\DTO\StatementItems
 */
$api->personalStatement(\DateTime $from, $account = 0, \DateTime $to = null);
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please send me an email at maksa988ua@gmail.com instead of using the issue tracker.

## Credits

- [Maksa988](https://github.com/maksa988)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.