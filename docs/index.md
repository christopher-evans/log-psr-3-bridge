# West Log PSR-3 Bridge

A bridge from a `West\Log\Log` to a `Psr\Log\LoggerInterface`


## Usage

A new logger is constructed as follows:
 
```php
namespace West\LogPsr3Bridge;

// a \West\Log\Log
$log = ...;

// construct the PSR-3 logger
$psrLogger = new Logger($log);
```

That's it!


## Notes

* The PSR-3 specification demands that the log levels given in [RFC-5454] be used, so an exception is thrown for invalid
log levels.


[RFC-5454]: https://www.ietf.org/rfc/rfc5424.txt