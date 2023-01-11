<?php
require_once __DIR__ ."/data/product.php";
$product = new Product("susu", 20000);
$info = new productDummy("susu", 20000);

$info->info();