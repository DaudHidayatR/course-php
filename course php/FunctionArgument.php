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

function sum(int $first, int $last){
    $total = $first + $last;
    echo " total $first + $last = $total" . PHP_EOL;
}
sum(100, 100);

function sumAll(...$values){
    $total = 0;
    foreach($values as $value){
        $total += $value;
    }
    echo "Total ".implode(",", $values). " = $total".PHP_EOL;
}
$values = [1, 2, 3, 4, 5];
sumALL(1, 2, 3, 4, 5);
sumAll(...$values);