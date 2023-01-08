<?php
$count = 0;
while (true) {
    echo "imi adalah for while ke-$count" . PHP_EOL;
    $count++;
    if ($count > 10) {
        break;
    }
}

for ($i = 0; $i <= 100; $i++) {
    if ($i % 2 == 0) {
        continue;
    }
    echo "coun : $i" . PHP_EOL;
}