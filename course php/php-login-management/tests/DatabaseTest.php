<?php

namespace Daudhidayatramadhan\LoginManagement\tests;

use Daudhidayatramadhan\LoginManagement\Config\Database;
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{

    public function testGetConnection()
    {
        $conn = Database::getConnection();
        self::assertNotNull($conn);
    }

    public function testGetConnectionSingleton()
    {
        $conn = Database::getConnection();
        $conn2 = Database::getConnection();
        self::assertSame($conn, $conn2);
    }

}
