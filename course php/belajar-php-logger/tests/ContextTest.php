<?php

namespace Daudhidayatramadhan\BelajarPhpLogger;

use Monolog\Handler\StreamHandler;
use Monolog\Test\TestCase;
use Monolog\Logger;

class ContextTest extends TestCase
{
    public function testContext()
    {
        $logger = new Logger(ContextTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));

        $logger->info("this is messege", ["username" => "Daud"]);
        $logger->info("try login success", ["username" => "Daud"]);
        $logger->info("Success login user", ["username" => "Daud"]);

        self::assertNotNull($logger);

    }

}