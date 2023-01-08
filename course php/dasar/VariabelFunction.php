<?php

function foo()
{
    echo "foo" . PHP_EOL;
}

function bar()
{
    echo "bar" . PHP_EOL;
}
$panggil = "foo";
$panggil();
function sayHello(string $name, $filter)
{
    $finalname = $filter($name);
    echo "hello $finalname" . PHP_EOL;
}
function samplefunction(string $name): string
{
    return "sample $name";
}
sayHello("daud", "samplefunction");
sayHello("daud", "strtoupper");
sayHello("daud", "strtolower");