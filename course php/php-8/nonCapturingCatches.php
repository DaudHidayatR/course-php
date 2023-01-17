<?php

use data\cat;

function test(string $value)
{
    if (trim($value) == ""){
        throw new Exception("Invalid string ");
    }
}
try{
    Test("    ");
}catch(Exception){
    echo "invalid string".PHP_EOL;
}