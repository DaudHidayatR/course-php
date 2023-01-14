<?php
require_once __DIR__ . "/data/animalShalter.php";
require_once __DIR__ . "/data/animal.php";
require_once __DIR__ . "/data/food.php";
use data\{catShalter, dogShalter,Food,animalFood};

$catShalter = new catShalter();
$cat = $catShalter->adopt("Juan");
$cat->eat(new animalFood());
var_dump($cat);


$dogShalter = new dogShalter();
$dog = $dogShalter->adopt("naela");
$dog->eat(new Food());
var_dump($dogShalter);