<?php 
require_once __DIR__ . '/getConnection.php';
$conn = getConnection();

$conn->exec("INSERT INTO comments(email,comment) VALUES ('siraj@gmail.com', 'halo siraj')");
$id = $conn->lastInsertId();

echo $id . PHP_EOL;

$conn = null;


?>