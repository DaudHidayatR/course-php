<?php

function increment()
{
    static $counter = 1;
    echo "counter = $counter" . PHP_EOL;
    $counter++;
}
increment();
increment();
increment();
increment();