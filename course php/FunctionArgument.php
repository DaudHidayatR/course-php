<?php
function sayhello($name){
    echo "hello $name" . PHP_EOL;
}
Sayhello("daud");
function hello($firstName, $lastName = "hidayat")
{
    echo "hello $firstName $lastName" . PHP_EOL;
}
hello("daud");