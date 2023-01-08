<?php

function sum(int $first, int $second): int
{
    $total = $first + $second;
    return $total;
}
$result = sum(10, 10);
var_dump($result);

function getValue(int $value): string
{
    if ($value >= 80) {
        return "Nilai anda A";
    } else if ($value >= 70) {
        return "Nilai anda B" . PHP_EOL;
    } else if ($value >= 60) {
        return "Nilai anda C" . PHP_EOL;
    } else if ($value >= 50) {
        return "Nilai anda D" . PHP_EOL;
    } else {
        return "Nilai anda E" . PHP_EOL;
    }
}
$score = getValue(70);
var_dump($score);