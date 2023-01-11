<?php
class person
{
    var string $name;
    var ?string $address = null;
    var string $country = "indonesia";
    function sayHello(string $name){
        echo "Hello $name"  . PHP_EOL;
    }
}