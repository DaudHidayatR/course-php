<?php
namespace Daudhidayatramadhan\BelajarPhpUnitTest;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

Class CounterTest extends TestCase
{
    public function  testCounter()
    {
        $counter = new counter();
        $counter->increment();
        $this->assertEquals(1, $counter->getCounter());
    }

    /**
     * @test
     */
    public function  increment(){
        $counter = new counter();
        $counter->increment();
        $this->assertEquals(1, $counter->getCounter());
    }
    public function testFirst():Counter
    {
        $counter = new counter();
        $counter->increment();
        $this->assertEquals(1, $counter->getCounter());
        return $counter;
    }

    /**
     * @depends testFirst
     */
    public function testSecond(Counter $counter):void
    {
        $counter->increment();
        $this->assertEquals(2, $counter->getCounter());
    }

}