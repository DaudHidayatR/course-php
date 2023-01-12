<?php
require_once __DIR__."/data/animal.php";

use Data\{animal, dog, cat};

$cat = new Cat();
$cat->name = 'luna';
$cat->run();

$dog = new Dog();
$dog->name = 'juan';
$dog->run();
