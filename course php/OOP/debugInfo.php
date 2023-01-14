<?php
require_once __DIR__ . "/data/student.php";

$students1 = new students();
$students1->name = "daud";
$students1->id = "1";
$students1->address = "jogja";
$students1->setSample("hello");
var_dump($students1);

