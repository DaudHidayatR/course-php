<?php

namespace Daudhidayatramadhan\BelajarPhpLogger;

use Monolog\Test\TestCase;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
class LoggingTest extends TestCase
{
    public function testLogging()
    {
        $logger = new Logger(HandlerTest::class);

        $logger->pushHandler(new StreamHandler("php://stdout"));
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log"));
        $logger->info("Belajar PHP logging ");
        $logger->info("Selamat Datang Daud Hidayat Ramadhan");
        self::assertNotNull($logger);
    }
}