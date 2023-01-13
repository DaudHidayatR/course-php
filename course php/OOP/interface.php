<?php
require_once __DIR__."/data/car.php";

use \Data\{Avanza, car};

$car = new Avanza();
$car->drive();

?>