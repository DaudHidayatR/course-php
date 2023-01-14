<?php
$array = [
    "firstName" => "daud",
    "middleName" => "Hidayat",
    "lastName" => "Ramadhan"
];

$object = (object) $array;
echo "First Name $object->firstName" . PHP_EOL;
echo "Middle Name $object->middleName" . PHP_EOL;
echo "Last Name $object->lastName" . PHP_EOL;

$arrayList = (array) $object;
var_dump($arrayList);

require_once __DIR__."/data/person.php";
$person = new person("daud", "yogyakarta");
var_dump($person);

$arrayperson = (array) $person;
var_dump($arrayperson);