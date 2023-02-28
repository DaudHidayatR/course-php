<?php

namespace Daudhidayatramadhan\BelajarPhpLogger;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Test\TestCase;


class ProcessorTest extends TestCase
{
    public function testProcessorRecord()
    {
    $logger = new Logger(ProcessorTest::class);
    $logger->pushHandler(new StreamHandler("php://stderr"));
    $logger->pushProcessor(new GitProcessor());
    $logger->pushProcessor(new MemoryUsageProcessor());
    $logger->pushProcessor(new HostnameProcessor());
    $logger->pushProcessor(function ($record){
        $record["extra"]["dhr"] = [
            "app" => "belajar PHP Logging",
            "author" => "Daud Hidayat Ramadhan"
        ];
        return $record;
    });
    $logger->info("hello world");

    self::assertNotNull($logger);
    }

}