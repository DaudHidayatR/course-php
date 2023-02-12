<?php
require_once __DIR__ . ('/vendor/autoload.php');

$customer = new \Daudhidayatramadhan\Belajar\Customers("daud");

echo $customer->sayHello().PHP_EOL;
echo $customer->sayHello("siraj").PHP_EOL;