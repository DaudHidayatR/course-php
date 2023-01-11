<?php
require_once __DIR__."/data/conflict.php";
require_once __DIR__ . "/data/helper.php";

$conf1 = new Data\One\conflict();
$conf2 = new Data\Two\conflict();

echo helper\APPLICTION . PHP_EOL;
helper\helpme();