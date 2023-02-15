<?php

namespace Daudhidayatramadhan\BelajarPhpUnitTest;

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    public function testSuccess()
    {
        $person = new Person("daud");
        $this->assertEquals("hello budi, Myname is daud", $person->sayHello("budi"));
    }
    public  function testException()
    {
        $person = new Person("daud");
        $this->expectException(\Exception::class);
        $person->sayHello(null);
    }
    public function testGoodByeSuccess()
    {
        $person = new Person("daud");
        $this->expectOutputString("Good bye Budi" . PHP_EOL );
        $person->sayGoodBye('Budi');

    }

}