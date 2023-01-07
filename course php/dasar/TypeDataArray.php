<?php
$values = array(1,2,3,4, 8.5);
var_dump($values);

$name = ["daud", "hidayat", "ramadhan"];
var_dump($name);

var_dump($name[0]);
$name[0] = "dayat";
var_dump($name[0]);
unset($name[2]);
$name[] = "dauud";
var_dump($name[0]);

var_dump(count($name));
$daud = array(
    "id" => "daud",
    "name" => "hidayat",
    "age" => "ramadhan",
    "alamat" => array(
        "city" => "yogyakarta",
        "country" => "sleman",
    )
);
var_dump($daud);