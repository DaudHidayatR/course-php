<?php
require_once "data/person.php";
$daud = new Person();
$daud-> name = 'daud';
$daud->sayHello("budi");
$daud->info();

$siraj = new person();
$siraj->name = 'siraj';
$siraj-> sayHello("daud");
$siraj->info();