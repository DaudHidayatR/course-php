<?php
namespace Daudhidayatramadhan\BelajarPhpUnitTest;

use PHPUnit\Framework\TestCase;

Class CounterTest extends TestCase
{
    public function  testCounter()
    {
        $counter = new counter();
        $counter->increment();
        echo $counter->getCounter();
    }
}