<?php
$value = "A";
$result = "";
// switch case
switch ($value) {
    case 'A':
    case 'B':
    case 'C':
        $result = "anda lulus";
        break;
    case 'D':
        $result = "Anda tidak lulus";
        break;
    case 'E':
        $result = "mungkin salah jurusan";
    default:
        $result = "mending pindah jurusan";
}

// match expression

$result = match ($value) {
    "A", "B", "c" => "anda lulus",
    "D" => "anda tidak lulus",
    "E" => "mungkin salah jurusan",
    default => "mending pindah jurusan"
};
echo $result . PHP_EOL;

$value = 80;
$value = match (true) {
    $value >80 => "A",
    $value >70 => "B",
    $value >60 => "C",
    $value>50 => "D",
    default => "E"
};
echo $value . PHP_EOL;

$name = "Mr. daud";

$result = match (true) {
    str_contains($name, "Mr.")=> "Hello sir",
    str_contains($name, "Ms.")=> "Hello miss.",
    default => "hello"
};
echo $result . PHP_EOL;