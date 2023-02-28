<?php

namespace Daudhidayatramadhan\BelajarPhpLogger;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;


class LevelTest extends TestCase
{
    public function testLevel()
    {
        $logger = new Logger(LevelTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushHandler(new StreamHandler(__DIR__."/../application.log"));
        $logger->pushHandler(new StreamHandler(__DIR__."/../error.log", Logger::ERROR));
        $logger->debug("this is debug");
        $logger->info("this is info");
        $logger->notice("this is notice");
        $logger->warning("this is warning");
        $logger->error("this is error");
        $logger->critical("this is critical");
        $logger->alert("this is alert");
        $logger->emergency("this is emergency");

        self::assertNotNull($logger);
    }
}