<?php 
require_once __DIR__.'/getConnection.php';

$conn = getConnection();

$sql= <<<SQL
SELECT * FROM customers;
SQL;
$statement = $conn->query($sql);
foreach($statement as $row){
    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    echo "id    : $id".PHP_EOL;
    echo "name  : $name".PHP_EOL;
    echo "email : $email".PHP_EOL;
}

$conn = null;
