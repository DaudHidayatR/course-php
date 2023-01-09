<?php

function faktorialloop(int $value): int
{
    $total = 1;
    for ($i = 1; $i <= $value; $i++) {
        $total *= $i;
    }
    return $total;
}
var_dump(faktorialloop(5));

function faktorialrekursive(int $value): int
{
    if ($value === 1) {
        return 1;
    } else {
        return $value * faktorialrekursive($value - 1);
    }
}
var_dump(faktorialrekursive(5));

function loop(int $value)
{
    if ($value === 0) {
        echo "selesai" . PHP_EOL;
    } else {
        echo "loop-$value" . PHP_EOL;
        loop($value - 1);
    }
}
loop(3000000);