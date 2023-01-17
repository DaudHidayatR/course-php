<?php
class example
{
    public string|int|float|array $data;


}
$example = new Example();
$example->data = "data";
$example->data = 1;
$example->data = 1.2;
$example->data = ["daud"];
var_dump($example);

function sampleFunction(string|array $data): string|array
{
    // if (is_array($data)) {
    //     echo "ini adalah array".PHP_EOL;
    // } else if (is_string($data)) {
    //     echo "ini adalah string".PHP_EOL;
    // }
    if (is_array($data)) {
        return ["array"];
    }
    else if (is_string($data)) {
        return "string";
    }
}
var_dump(sampleFunction("daud"));
var_dump(sampleFunction([]));