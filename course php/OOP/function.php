<?php
require_once "data/person.php";
$daud = new Person("daud", "yogyakarta");
$daud->sayHello("budi");
$daud->info();

$siraj = new person("siraj", "Batam");
$siraj-> sayHello("daud");
$siraj->info();