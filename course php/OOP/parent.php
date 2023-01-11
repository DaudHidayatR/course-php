<?php

require_once __DIR__. "/data/shape.php";

use data\{shape, rectangle};

$shape = new shape();
echo $shape->getCouner(). PHP_EOL;

$rectangle = new rectangle();
echo $rectangle->getCouner().PHP_EOL;
echo $rectangle->getparentCorner().PHP_EOL;
