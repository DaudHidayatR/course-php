<?php

namespace Daudhidayatramadhan\BelajarPhpLogger;


use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Test\TestCase;
use Monolog\Logger;

class FormatterTest extends TestCase
{
    public function testFormatter()
    {
    $logger = new Logger(FormatterTest::class);

    $handler= new StreamHandler("php://stderr");
    $handler->setFormatter(new JsonFormatter());

    $logger->pushHandler($handler);
    $logger->pushProcessor(new GitProcessor());
    $logger->pushProcessor(new MemoryUsageProcessor());
    $logger->pushProcessor(new HostnameProcessor());

    $logger->info("Belajar PHP Looging",["username"=>"daud"]);
    $logger->info("belajar PHP Logging lagi");

    self::assertNotNull($logger);
    }

}