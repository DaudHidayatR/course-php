<?php
require_once __DIR__ . "/data/manager.php";
$manager = new manager();
$manager->name = "daud";
$manager->sayHello("siraj");

$vp = new vicePresident();
$vp->name = "daud";
$vp->sayHello("juan");