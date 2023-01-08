<?php

$gender = "laki-laki";
$hi = null;

if ($gender == "laki-laki"){
    echo "Hi bro!";
} else{
    $hi = "Hi nona!";
}

echo $hi. PHP_EOL;

$gender = "laki-laki";

$hi = $gender == "laki-laki" ? "Hi bro!" : "Hi nona!";
echo $hi. PHP_EOL;
