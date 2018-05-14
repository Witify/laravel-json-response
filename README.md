# Quick JSON reponses in Laravel 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/Witify/laravel-json-response.svg?style=flat-square)](https://packagist.org/packages/witify/laravel-json-response)
[![Build Status](https://img.shields.io/travis/Witify/laravel-json-response/master.svg?style=flat-square)](https://travis-ci.org/witify/laravel-json-response)
[![Maintainability](https://api.codeclimate.com/v1/badges/4c8a395f8d76e65652c5/maintainability)](https://codeclimate.com/github/Witify/laravel-seo-attributes/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/4c8a395f8d76e65652c5/test_coverage)](https://codeclimate.com/github/Witify/laravel-seo-attributes/test_coverage)
[![Total Downloads](https://img.shields.io/packagist/dt/Witify/laravel-json-response.svg?style=flat-square)](https://packagist.org/packages/witify/laravel-json-response)

## Installation

You can install the package via composer:

```bash
composer require witify/laravel-json-response
```

## Usage

Add it to your controller:
``` php

use Witify\LaravelJsonReponse\JsonTrait;

class ApiController extends Controller {
    use JsonTrait;
}
```

## Available methods

| Method | Description |
| --- | --- |
| setStatusCode(int $statusCode) | Set the status code of the response |
| getStatusCode(int $statusCode) | Get the status code of the response |
| response($data, $headers = []) | Create a json response |
| success($message = "", $data = null) | Create a successful json response |
| error($message = "", $data = null) | Create a failed json response  |

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email info@witify.io instead of using the issue tracker.

## Credits

- [François Lévesque](https://github.com/francoislevesque)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
