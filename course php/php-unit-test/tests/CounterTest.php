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
}