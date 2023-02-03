<?php
require_once __DIR__ . '/getConnection.php';

$conn = getConnection();
$username = 'kipli';
$password = 'admin';


$sql = "INSERT INTO admin(username,password) VALUES(:username,:password)";
$prepare = $conn->prepare($sql);

$prepare->bindParam("username", $username);
$prepare->bindParam("password", $password);
$prepare->execute();


$conn = null;



?>