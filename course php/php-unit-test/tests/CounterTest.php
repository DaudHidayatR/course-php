<?php
namespace Daudhidayatramadhan\BelajarPhpUnitTest;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

Class CounterTest extends TestCase
{
    private Counter $counter;
    protected function setUp(): void
    {
        $this->counter = new Counter();

    }
    public  function testIncrement(){
        self::assertEquals(0,$this->counter->getCounter());
        self::markTestIncomplete("Todo do Counter again");
//        echo "Test test".PHP_EOL;

    }

    public function  testCounter()
    {
        $this->counter->increment();
        $this->assertEquals(1, $this->counter->getCounter());
    }

    /**
     * @test
     */
    public function  increment(){
        self::markTestSkipped("Masih ada bug");
        $this->counter->increment();
        $this->assertEquals(1, $this->counter->getCounter());
    }
    public function testFirst():Counter
    {
        $this->counter->increment();
        $this->assertEquals(1, $this->counter->getCounter());
        return $this->counter;
    }

    /**
     * @depends testFirst
     */
    public function testSecond(Counter $counter):void
    {
        $counter->increment();
        $this->assertEquals(2, $counter->getCounter());
    }
    protected function tearDown(): void
    {
        echo "tear down".PHP_EOL;
    }
    /**
     * @after
     */
    protected function after(): void
    {
        echo "After" . PHP_EOL;
    }

    /**
     * @requires OSFAMILY Linux
     */
    public function testOnlyLinux(){
        self::assertTrue(true, 'only in linux');
    }
    /**
     * @requires  PHP >= 8
     * @requires  OSFAMILY Windows
     */
    public function testOnlyForWindows(){
        self::assertTrue(true, "ony for Windows and PHP 8");
    }
}