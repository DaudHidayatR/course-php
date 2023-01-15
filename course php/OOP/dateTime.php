<?php
$dateTime = new DateTime();
$dateTime->setDate(1990, 1, 20);
$dateTime->setTime(10, 10, 10, 0);

$dateTime->add(new DateInterval("P1Y"));
$minusTwoMonth = new DateInterval("P2M");
$minusTwoMonth->invert = true;
$dateTime->add($minusTwoMonth);

var_dump($dateTime);

$now = new DateTime();
var_dump($now);
$now->setTimezone(new DateTimeZone("UTC"));
var_dump($now);

$string = $now->format('Y-m-d H:i:s');
echo "waktu saat ini $string" . PHP_EOL;

$date = DateTime::createFromFormat("Y-m-d H:i:s", "2020-10-10 10:10:10", new DateTimeZone("Asia/jakarta"));
var_dump($date);