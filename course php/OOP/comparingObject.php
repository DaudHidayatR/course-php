<?php

require_once __DIR__ . "/data/student.php";

$students1 = new Students();
$students1->name = "daud";
$students1->id = "1";
$students1->address = "jogja";
$students1->setSample("hello");

$students2 = new Students();
$students2->name = "daud";
$students2->id = "1";
$students2->address = "jogja";
$students2->setSample("hello");

var_dump($students1 == $students2);
var_dump($students1 === $students2);