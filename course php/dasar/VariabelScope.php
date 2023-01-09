<?php
$name = "daud";

function sayHello(){
    global $name;
    echo $name . PHP_EOL;

    echo $GLOBALS["name"].PHP_EOL;
}
SayHello();