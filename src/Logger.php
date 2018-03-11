<?php
/*
 * This file is part of the West\\LogPsr3Bridge package
 *
 * (c) Chris Evans <cmevans@tutanota.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace West\LogPsr3Bridge;

use Psr\Log\AbstractLogger;
use Psr\Log\InvalidArgumentException;
use Psr\Log\LogLevel;
use West\Log\Log;

/**
 * @brief %Class mapping a West::Log logger to a PSR-3 LoggerInterface logger
 *
 * @details
 * <p>
 *     A Psr::Log::InvalidArgumentException is thrown in the case of an invalid log level.
 * </p>
 *
 * @author Christopher Evans <cmevans@tutanota.com>
 * @see http://www.php-fig.org/psr/psr-3/
 * @see West::Log::Log
 * @date 11 March 2018
 */
final class Logger extends AbstractLogger
{
    /**
     * @brief West\Log logger
     *
     * @var Log $log
     */
    private $log;

    /**
     * Logger constructor.
     *
     * @param Log $log
     */
    public function __construct(Log $log)
    {
        $this->log = $log;
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     *
     * @return void
     * @throws \Exception
     */
    public function log($level, $message, array $context = [])
    {
        if (! is_string($level)) {
            throw new InvalidArgumentException('Invalid level');
        }

        if (! defined(LogLevel::class . '::'.strtoupper($level))) {
            throw new InvalidArgumentException('Level "'.$level.'" is not defined');
        }

        $this->log->log($level, $message, $context);
    }
}
