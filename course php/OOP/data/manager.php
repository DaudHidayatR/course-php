<?php
class manager
{
    var string $name;

    function sayHello(string $name): void
    {
        echo "Hi $name , my name is $this->name". PHP_EOL;
    }
}
class vicePresident extends manager {
    function sayHello(string $name): void
    {
        echo "Hi $name , my name is VP $this->name" . PHP_EOL;
    }
}