<?php

require_once __DIR__ . "/data/conflict.php";
require_once __DIR__ . "/data/helper.php";

use Data\One\conflict;
use function helper\helpme;
use const helper\APPLICTION;

$conf1 = new conflict();
$conf2 = new Data\Two\conflict();

helpme();

echo APPLICTION . PHP_EOL;