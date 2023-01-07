<?php
$name ="daud";
$name = null;

$age = null;
echo "Name: " . $name. "\n";

echo "Age: " . $age. "\n";

echo "Is name null? : ". var_dump(is_null($name))."\n";
// echo is_null($name);

$contoh = "daud";
unset($contoh);
var_dump(isset($contoh))."\n";