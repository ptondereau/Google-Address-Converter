# google-address-converter

## WIP comming soon

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status](https://travis-ci.org/ptondereau/Google-Address-Converter.svg?branch=master)](https://travis-ci.org/ptondereau/Google-Address-Converter)[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Install

Via Composer

``` bash
$ composer require ptondereau/google-address-converter
```

## Usage

``` php
// Create client
$apiKey = 'xxxxx';
$googleConverter = new GoogleMapsClient($api);

// Create address to convert
$address = new Address();
$address->setAddressLine1('address1')
    ->setAddressLine2('address2')
    ->setAddressLine3('address3')
    ->setCity('city')
    ->setZipCode('zipCode');
    
// Get Lat and long
$googleConverter->getLatLong($address);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email pierre.tondereau@gmail.com instead of using the issue tracker.

## Credits

- [Pierre Tondereau][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/ptondereau/google-address-converter.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/ptondereau/google-address-converter/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/ptondereau/google-address-converter.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/ptondereau/google-address-converter.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/ptondereau/google-address-converter.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/ptondereau/google-address-converter
[link-travis]: https://travis-ci.org/ptondereau/google-address-converter
[link-scrutinizer]: https://scrutinizer-ci.com/g/ptondereau/google-address-converter/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/ptondereau/google-address-converter
[link-downloads]: https://packagist.org/packages/ptondereau/google-address-converter
[link-author]: https://github.com/ptondereau
[link-contributors]: ../../contributors
