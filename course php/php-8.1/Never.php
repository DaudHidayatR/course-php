<?php
function stop(): never
{
    echo "STOP". PHP_EOL;
    exit();
}
stop();
echo "ups". PHP_EOL;