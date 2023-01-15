<?php
$matches = [];
$result = preg_match_all("/daud|Hida|ra/i", "daud Hidayat Ramadhan", $matches);

var_dump($result);
var_dump($matches);

$result= preg_replace("/kiplan|supri/i", "***","kiplan dan supri bertemu");

var_dump($result);

$result = preg_split("/[\s,-]/", "daud Hidayat Ramadhan");
var_dump($result);