<?php
function sayHello(?string $name)
{
    if ($name == null) {
        throw new Exception("tidak boleh kosong");
    }
    echo "hello $name" . PHP_EOL;
}

function sayHelloExpression(?string $name)
{
    $result = $name != null ? "hello $name" : throw new Exception("tidak boleh kosong");
}
sayHelloExpression(null);