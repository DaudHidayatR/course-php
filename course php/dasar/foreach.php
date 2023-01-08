<?php
$name = ["daud", "hidayat", "ramadhan"];

foreach($name as $names){
    echo $names . PHP_EOL;
}
$person = [
    "first_name" => "daud",
    "middle_name" => "hidayat",
    "last_name" => "ramadhan"
];

foreach ($person as $key => $value){
    echo "$key : $value" . PHP_EOL;
}