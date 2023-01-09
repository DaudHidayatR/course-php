<?php
function sayHello(string $name, callable $filter)
{
    $finelName = call_user_func($filter, $name);
    echo "hello $finelName " . PHP_EOL;
}

SayHello("daud", "strtoupper");
SayHello("daud", "strtolower");
SayHello("daud", function (string $name): string {
    return strtolower($name);
});
SayHello("daud", fn($name) => strtoupper($name));