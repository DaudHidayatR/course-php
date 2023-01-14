<?php 
require_once __DIR__."/helper/mathHelper.php";
use helper\mathHelper;

$mathHelper = new mathHelper();
echo $mathHelper::$name . PHP_EOL;
$mathHelper::$name = "daud";

echo $mathHelper::$name . PHP_EOL;
$result = mathHelper::sum(10, 10, 10, 10);
echo $result . PHP_EOL;
?>