<?php 
require_once __DIR__. "/data/sayGoodbye.php";

use Data\Traits\{person, sayGoodbye, sayHello};

$person = new Person();
$person->goodBye("daud");
$person->hello("daud");
$person->name = "daud";
var_dump($person);
?>