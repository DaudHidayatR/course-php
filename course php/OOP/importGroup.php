<?php
require_once __DIR__ . "/data/conflict.php";
require_once __DIR__ . "/data/helper.php";

use Data\one\{conflict as conf1, Dummy, sample};
use function helper\{helpme};

$conf1 = new conf1();
// $dummy = new Dummy();
// $sample = new Sample();