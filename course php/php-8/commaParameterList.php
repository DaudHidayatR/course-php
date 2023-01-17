<?php
function sayHello(string $first, string $last) {

}
function sum(int...$values):int
{
    $total = 0;
    foreach ( $values as $value){
        $total += $value;
    }
    return $total;
}
SayHello(
    "daud",
    "daud"
);
echo sum(
    1,
    1,
    1,
    1,
    1,
    1,
    1,
);

$array = [
    "first" => 2,
    "second" =>2,
    "last" =>2,

];