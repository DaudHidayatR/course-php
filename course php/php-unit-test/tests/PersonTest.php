<?php

namespace Daudhidayatramadhan\BelajarPhpUnitTest;

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    private Person $person;

    protected  function setUp(): void
    {

    }

    /**
     * @before
     */
    public function createPerson()
    {
    $this->person = new person('daud');
    }
    public function testSuccess()
    {
        $this->assertEquals("hello budi, Myname is daud", $this->person->sayHello("budi"));
    }
    public  function testException()
    {
        $this->expectException(\Exception::class);
        $this->person->sayHello(null);
    }
    public function testGoodByeSuccess()
    {
        $this->expectOutputString("Good bye Budi" . PHP_EOL );
        $this->person->sayGoodBye('Budi');
    }

}