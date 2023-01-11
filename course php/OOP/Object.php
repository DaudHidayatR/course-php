<?php
require_once "data/person.php";
$person1 = new Person("daud", "yogyakarta");
$person1->country = "indonesia";

var_dump($person1);

echo "Name : $person1->name" . PHP_EOL;
echo "Address : $person1->address" . PHP_EOL;
echo "Country : $person1->country" . PHP_EOL;

$person2 = new Person("naela", "kudus");


echo "Name : $person2->name" . PHP_EOL;
echo "Address : $person2->address" . PHP_EOL;
echo "Country : $person2->country" . PHP_EOL;