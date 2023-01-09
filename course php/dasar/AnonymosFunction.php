<?php
$sayHello = function (string $name) {
    echo "hello $name" . PHP_EOL;
};
$sayHello("daud");

function saygoodbye(string $name, $filter)
{
    $finalname = $filter($name);
    echo "Goodbye $finalname" . PHP_EOL;
}

saygoodbye("daud", function (string $name): string {
    return strtoupper($name);
});

$filterfunction = function (string $name): string {
    return strtolower($name);
};
saygoodbye("daud", $filterfunction);

$firstName = "daud";
$lastName = "ramadhan";

$sayHello = function () use ($firstName, $lastName) {
    echo "Hello $firstName $lastName" . PHP_EOL;
};
$sayHello();

$firstName = "kipli";
$lastName = "bintang";

$sayHello();