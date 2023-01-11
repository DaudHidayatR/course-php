<?php

require_once __DIR__ . "/data/conflict.php";
require_once __DIR__ . "/data/helper.php";

use Data\One\conflict as conf1;
use Data\Two\conflict as conf2;
use function helper\helpme as help;
use const helper\APPLICTION as APP;

$conf1 = new Conf1();
$conf1 = new Conf2();

help();

echo APP . PHP_EOL;