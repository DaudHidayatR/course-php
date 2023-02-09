<?php
require_once __DIR__.'/vendor/autoload.php';
use BelajarPhpComposer\Data\People;

$people = new People("daud");
echo $people->sayHello("siraj").PHP_EOL;