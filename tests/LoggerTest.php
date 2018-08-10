<?php
/**
 * This file is part of the West\\LogPsr3Bridge package
 *
 * (c) Chris Evans <cmevans@tutanota.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace West\LogPsr3Bridge;

use PHPUnit\Framework\TestCase;
use Psr\Log\InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use West\Log;

class AggregateLogTest extends TestCase
{
    /** @var $logger LoggerInterface logger */
    private $logger;

    /** @var $variableTarget Target\Variable target variable for log message */
    private $variableTarget;

    public function setUp()
    {
        // log format
        $format = new Log\ServerFormat(\DateTime::W3C, "\n");

        // log filter -- entries less than 'warning' are ignored
        $filter = new Log\PipeFilter();

        // delimiters containing string parameters
        $expansion = new Log\StringExpansion('{', '}');

        // write to a file
        $variableTarget = new Target\Variable();

        // add the file target to the log stack
        $notifications = [
            new Log\DefaultNotification(
                $variableTarget,
                $expansion,
                $format,
                $filter
            )
        ];

        // create the log
        $this->logger = new Logger(
            new Log\AggregateLog($notifications)
        );

        // save target variable for test assertions
        $this->variableTarget = $variableTarget;
    }

    /**
     * @dataProvider providerTestInvalidLevel
     */
    public function testInvalidLevel($level, $message)
    {
        $this->expectException(InvalidArgumentException::class);

        $this->logger->log($level, $message);
    }

    public function providerTestInvalidLevel()
    {
        return [
            [
                'none',
                'string'
            ],
            [
                '',
                ''
            ],
            [
                new \stdClass(),
                'string'
            ],
            [
                [],
                'string'
            ]
        ];
    }

    /**
     * @dataProvider providerTestValidLevel
     */
    public function testValidLevel($level, $message)
    {
        $this->logger->log($level, $message);

        $result = (string) $this->variableTarget;

        $this->assertContains($level, $result);
        $this->assertContains($message, $result);
    }

    public function providerTestValidLevel()
    {
        return [
            [
                LogLevel::ALERT,
                'string'
            ],
            [
                LogLevel::NOTICE,
                ''
            ],
            [
                LogLevel::DEBUG,
                'string'
            ]
        ];
    }
}
