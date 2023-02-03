<?php
require_once __DIR__ . '/getConnection.php';

$conn = getConnection();

$sql = "SELECT * FROM customers ";
$statement = $conn->query($sql);
$customers = $statement->fetchAll();
var_dump($customers);




$conn = null;