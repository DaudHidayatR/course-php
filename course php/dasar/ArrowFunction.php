<?php
$firstName = "daud";
$lastName = "ramadhan";

$arrowFunction = fn() => "Hello $firstName $lastName" . PHP_EOL;
echo $arrowFunction();