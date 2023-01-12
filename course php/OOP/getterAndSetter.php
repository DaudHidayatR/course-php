<?php
require_once __DIR__ .'/data/category.php';

$category = new Category();
$category->setName("juan");
$category->setExpensive("siraj");
$category->setName("");
echo "expensive :".$category->getExpensive().PHP_EOL;
echo "name: ".$category->getName().PHP_EOL;