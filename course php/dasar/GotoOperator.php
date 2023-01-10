<?php
goto a;

// echo "hello world";
a:
echo "hello A";

$count = 0;
while (true) {
    echo "imi adalah for while ke-$count" . PHP_EOL;
    $count++;
    if ($count > 10) {
        goto end;
    }
}
end:
echo "endloop";