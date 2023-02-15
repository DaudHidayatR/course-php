<?php

namespace Daudhidayatramadhan\BelajarPhpUnitTest;

class Person
{
    public function __construct(private string $name)
    {
    }
    public function sayHello(?string $name)
    {
        if ($name == null) throw new \Exception("name is null");

        return "hello $name, Myname is $this->name";
    }
}