<?php

function test(mixed $data): mixed
{
    if (is_array($data)){
        return [];
    }else if (is_string($data)){
        return "string";
    }else if(is_int($data)){
        return 1;
    } else if (is_bool($data)) {
        return true;
    }
}
var_dump(test(""));
var_dump(test([]));
var_dump(test(true));