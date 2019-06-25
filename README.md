# Monobank API Client

PHP client for MonoBank API services (https://api.monobank.ua/docs/)

- List of monobank currency rates
- Information about the client and the list of his accounts
- Receive an extract

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
$api->personalInfo(\DateTime $from, $account = 0, \DateTime $to = null);
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