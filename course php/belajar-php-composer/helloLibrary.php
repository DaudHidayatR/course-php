<?php
require_once __DIR__ . ('/vendor/autoload.php');

$customer = new \Daudhidayatramadhan\Belajar\Customers("daud");

echo $customer->sayHello("siraj").PHP_EOL;