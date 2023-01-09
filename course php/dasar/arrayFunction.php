<?php
$data = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

$mapFunction = fn(int $value) =>$value * 10;


$dataResult = array_map($mapFunction, $data);
var_dump($dataResult);

rsort($data);
var_dump($data);

var_dump(array_keys($data));
var_dump(array_values($data));

$person = [
    "firstName" => "daud",
    "lastName" => "ramadhan",
];
var_dump(array_keys($person));
var_dump(array_values($person));