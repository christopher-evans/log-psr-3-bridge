# West Log PSR-3 Bridge

### Master
[![Build Status](https://travis-ci.org/christopher-evans/log.svg?branch=master)](https://travis-ci.org/christopher-evans/log)
[![Coverage Status](https://coveralls.io/repos/github/christopher-evans/log/badge.svg)](https://coveralls.io/github/christopher-evans/log)
[![Maintainability](https://api.codeclimate.com/v1/badges/9709ef3f069c06f40e4c/maintainability)](https://codeclimate.com/github/christopher-evans/log/maintainability)

## Autoloading

This package is [PSR-4][] autoloadable via composer or otherwise mapping the `West\Log`
namespace to the `src/` directory.  To run the tests the `West\Log` namespace should map
to the `tests/` directory.


## Dependencies

This package requires PHP 7.0 or later; interfaces required by the package are
documented in the [composer.json][] file.


## Code Quality

To run the unit tests and generate a coverage report with [PHPUnit][] run
`composer install` followed by `composer test` at the command line.

This package should comply with the recommendations set out in [PSR-1][], [PSR-2][]
and [PSR-4][].


## Documentation

This package is documented [here](./docs/index.md).  To generate the docs run
run `composer install --no-dev`, ensure [Doxygen][] is installed and available
as `doxygen` and run `composer docs`.


[PSR-1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
[PSR-2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[PSR-3]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-3-logger-interface.md
[PSR-4]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md
[Composer]: http://getcomposer.org/
[Doxygen]: http://www.stack.nl/~dimitri/doxygen/
[PHPUnit]: http://phpunit.de/
[composer.json]: ./composer.json
[PMD]: https://pmd.github.io/